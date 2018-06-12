import cv2
import cntk
import os
from os import walk
import numpy as np
import argparse
from cntk.device import try_set_default_device, gpu, all_devices
from cntk.ops.functions import load_model

ap = argparse.ArgumentParser()
ap.add_argument("-m", "--model", required=True, help="path to cntk model")
ap.add_argument("-i", "--image", required=True, help="path to the input image")
args = vars(ap.parse_args())

input_dim_model = (3, 256, 256)
input_dim = 3 * 256 * 256
num_output_classes = 256 * 256

def read_color_img(path):
    bgr = cv2.imread( path, cv2.IMREAD_COLOR )
    b, g, r = cv2.split( bgr )
    img = cv2.merge( [r, g, b] )
    return img

def create_reader_text(path, is_training, input_dim, num_label_classes):   
    labelStream = cntk.io.StreamDef(field='label', shape=num_label_classes, is_sparse=False)
    featureStream = cntk.io.StreamDef(field='features', shape=input_dim, is_sparse=False)
    deserailizer = cntk.io.CTFDeserializer(path, cntk.io.StreamDefs(label = labelStream ,feature = featureStream))      
    return cntk.io.MinibatchSource(deserailizer,
       randomize = False, multithreaded_deserializer=False,max_sweeps = cntk.io.INFINITELY_REPEAT if is_training else 1)

def load_test(src_file) :
    return create_reader_text(src_file, False, input_dim, num_output_classes)

def predict_image(src_file, model) :
    samples_train_size = len(open(src_file).readlines())
    reader_test = load_test(src_file)
    
    minibatch_size = 1
    num_samples_per_sweep = samples_train_size
    num_minibatches_to_train = (num_samples_per_sweep ) / minibatch_size
    
    input_map = {'label': reader_test.streams.label, 'input': reader_test.streams.feature} 

    data_x, data_y = [], []
    for i in range(0, int(num_minibatches_to_train)):
        # Read a mini batch from the training data file
        data = reader_test.next_minibatch(minibatch_size, input_map=input_map) 

        training_data = []
        for k in data.keys() :
            for v in data[k].as_sequences()[0] :
                 training_data.append(v)
                    
        data_x.append(training_data[0])
        data_y.append(training_data[1])

    labels = np.reshape(data_x, (num_samples_per_sweep,1,256,256))
    features = np.reshape(data_y,(num_samples_per_sweep,3,256,256))
    
    pred = prediction_image(features, model)
    img = create_white_image()
    rows, cols = pred[0][0].shape
    
    count = 0
    for row in range(rows) :
        for col in range(cols) :
            if pred[0,0,row,col] > 0.5:
                img[row,col] = 255
                count +=1 
            else :
                img[row,col] = 0
    
    print(count)

def prediction_image(features_image, model) :
    return model.eval(features_image)

def convert_list_to_string(current_list) :
    current_string = ""
    for value in current_list :
        current_string += str(value) + " "
        
    return current_string

def get_labels_and_features(image_rgb) :
    labels, features , r, g, b= [], [], [], [], []
    rows, cols, channel = image_rgb.shape
    
    for row in range(rows) :
        for col in range(cols) :

                labels.append(0)
    
                r.append(image_rgb[row, col, 0])
                g.append(image_rgb[row, col, 1])
                b.append(image_rgb[row, col, 2])
    
    features = r + g + b 
    return labels, features

def get_features(image_rgb) :
    labels, features = get_labels_and_features(image_rgb)
    
    label_string = convert_list_to_string(labels)
    feature_string = convert_list_to_string(features)
    
    return "|label " + label_string + "|features " + feature_string

size_target = 256
height, width = size_target, size_target

def create_white_image():
    img = np.zeros(shape = (height,width,3) ,dtype = np.uint8)
    img.fill(255)
    return img

def resize_image(image_rgb) :
    size_target, resize_volumn = 256, 0
    rows, cols, channel = image_rgb.shape
    res_image = image_rgb
    
    
    if rows >= cols :
        resize_volumn = size_target/rows
    else :
        resize_volumn = size_target/cols
        
    if rows > size_target or cols > size_target :
        res_image = cv2.resize(image_rgb, None, fx= resize_volumn, fy= resize_volumn, interpolation = cv2.INTER_CUBIC)
    
    bg_image = create_white_image()
    rows, cols, channel = res_image.shape

    for row in range(rows):
        for col in range(cols):
            bg_image[row,col] = res_image[row, col]

    return bg_image

def process(image, model) :
    feature_file = get_features(image)
    
    file = open('feature.txt', 'w')
    file.write(feature_file)
    file.close()
    
    predict_image('feature.txt', load_model(model))

'''
model = 'model1.model'
image = 'b_12.png'
'''
model = args["model"] 
image = args["image"]
process(resize_image(read_color_img(image)), model)

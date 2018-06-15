from scipy.spatial import distance as dist
from imutils import perspective
from imutils import contours
import numpy as np
import argparse
import imutils
import cv2
import random

def midpoint(ptA, ptB):
    return (ptA[0] + ptB[0]) * 0.5, (ptA[1] + ptB[1]) * 0.5

# construct the argument parse and parse the arguments
ap = argparse.ArgumentParser()
ap.add_argument("-i", "--image", required=True,
                help="path to the input image")
ap.add_argument("-w", "--width", type=float, required=True,
                help="width of the left-most object in the image (in inches)")
ap.add_argument("-c", "--contour", type=int, required=True,
                help="Reference object contour no")
args = vars(ap.parse_args())

# load the image, convert it to grayscale, and blur it slightly
image = cv2.imread(args["image"])
gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
gray = cv2.GaussianBlur(gray, (7, 7), 0)

# perform edge detection, then perform a dilation + erosion to
# close gaps in between object edges
edged = cv2.Canny(gray, 50, 100)
edged = cv2.dilate(edged, None, iterations=1)
edged = cv2.erode(edged, None, iterations=1)

# find contours in the edge map
cnts = cv2.findContours(edged.copy(), cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_SIMPLE)
cnts = cnts[0] if imutils.is_cv2() else cnts[1]

(cnts, _) = contours.sort_contours(cnts)
orig = image.copy()
color_list = []
count = 1
contour_list = []

for c in cnts:
    if cv2.contourArea(c) < 300:
        continue

    contour_list.append(c)
    r = int(random.random() * 256)
    g = int(random.random() * 256)
    b = int(random.random() * 256)
    color_list.append([r, g, b, count])

    M = cv2.moments(c)
    cX = int(M["m10"] / M["m00"])
    cY = int(M["m01"] / M["m00"])

    cv2.drawContours(orig, [c], -1, (b, g, r), 2)
    cv2.putText(orig, str(count), (cX, cY), cv2.FONT_HERSHEY_SIMPLEX, 1, (0, 0, 0), 3)
    count += 1

cv2.imwrite('contour2.jpg', orig)
# -------------------------------------------------------------------------------------

refNo = args["contour"]
refContour = contour_list[refNo - 1]

box = cv2.minAreaRect(refContour)
box = cv2.boxPoints(box) if imutils.is_cv2() else cv2.boxPoints(box)
box = np.array(box, dtype="int")
box = perspective.order_points(box)
#print(box)

pixel_list = []
pixelsPerCM_list = []
for (x, y) in box:
    (tl, tr, br, bl) = box
    (tltrX, tltrY) = midpoint(tl, tr)
    (blbrX, blbrY) = midpoint(bl, br)
    (tlblX, tlblY) = midpoint(tl, bl)
    (trbrX, trbrY) = midpoint(tr, br)

    # draw lines between the midpoints
    cv2.line(orig, (int(tltrX), int(tltrY)), (int(blbrX), int(blbrY)), (255, 0, 255), 2)
    cv2.line(orig, (int(tlblX), int(tlblY)), (int(trbrX), int(trbrY)), (255, 0, 255), 2)

    # compute the Euclidean distance between the midpoints
    dA = dist.euclidean((tltrX, tltrY), (blbrX, blbrY))
    dB = dist.euclidean((tlblX, tlblY), (trbrX, trbrY))
    pixel_list.append(dA)
    pixel_list.append(dB)

    pixelsPerCM = dB / args["width"]
    pixelsPerCM_list.append(pixelsPerCM)
    #print(pixelsPerInch)

    pixelsPerCM2 = dA / args["width"]
    pixelsPerCM_list.append(pixelsPerCM2)

    # compute the size of the object
    dimA = dA / pixelsPerCM
    dimB = dB / pixelsPerCM

    # draw the object sizes on the image
    cv2.putText(orig, "{:.1f}in".format(dimA), (int(tltrX - 15), int(tltrY - 10)), cv2.FONT_HERSHEY_SIMPLEX,
                0.65, (255, 255, 255), 2)
    cv2.putText(orig, "{:.1f}in".format(dimB), (int(trbrX + 10), int(trbrY)), cv2.FONT_HERSHEY_SIMPLEX,
                0.65, (255, 255, 255), 2)

#avg_pixelPerInch = sum(pixelsPerInch_list) // len(pixelsPerInch_list)
#print(avg_pixelPerInch)

max_pixelPerCM = max(pixelsPerCM_list)
area = 3.14 * ((2.5/2) * (2.5/2))

max_pixel = max(pixel_list)
print(area, max_pixel)

cv2.imwrite('contour_ref.jpg', orig)
#print("Finish")

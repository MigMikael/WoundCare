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
ap.add_argument("-i", "--image", required=True, help="path to the input image")
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
contour_no = []

for c in cnts:
    if cv2.contourArea(c) < 1000:
        continue

    r = int(random.random() * 256)
    g = int(random.random() * 256)
    b = int(random.random() * 256)
    color_list.append([r, g, b, count])

    M = cv2.moments(c)
    cX = int(M["m10"] / M["m00"])
    cY = int(M["m01"] / M["m00"])

    cv2.drawContours(orig, [c], -1, (b, g, r), 2)
    cv2.putText(orig, str(count), (cX, cY), cv2.FONT_HERSHEY_SIMPLEX, 1, (0, 0, 0), 3)

    contour_no.append(count)
    count += 1

# cv2.imwrite('/var/www/html/WoundCare/public/contour.jpg', orig)
print(count - 1)
cv2.imwrite('contour.jpg', orig)
# -------------------------------------------------------------------------------------
# print("Finish")

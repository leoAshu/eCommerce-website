import cv2 as cv

file_prefix = 'water-repellent-puffer-jacket'

for i in range(1,5):
    file_name = file_prefix + '-' + str(i) + ".jpg"

    img = cv.imread(file_name)

    img = cv.resize(img, (768, 768))

    cv.imwrite('products/' + file_prefix + '/' + str(i) + '.jpg', img)
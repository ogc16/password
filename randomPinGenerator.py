def pinPicker(number):
  import random
  pin = ""
  for i in range(number):  
    pin += str(random.randint(0,9))   
  return pin

pinPicker(4)#4 random numbers
myPin = pinPicker(4)
print(myPin)

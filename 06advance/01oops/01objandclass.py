class Dog:
    def __init__(self, name):
        self.name = name

    def bark(self):
        print(f"{self.name} says Woof!")

my_dog = Dog("Buddy")
my_dog.bark()

#without init construtor class
class Dog01:
    def bark(self):
        print("Wolf")

d = Dog01()
d.bark()


#Encapsulation:- Hiding internal detials and exposing only what's necessary.
class Account:
    def __init__(self, balance):
        self.__balance = balance #private variable

    def deposit(self, amount):
        self.__balance += amount

    def get_balance(self):
        return self.__balance

acc = Account(1000)
acc.deposit(500)
print(acc.get_balance())
#print(acc.__balance) #this would raise an AttributeError

#Inheritance
#One class (child) can inherit attributes and methods from another (parnet)
class Animal01:
    def speak(self):
        print("Animal speaks")

class Dog02(Animal01): #Dog inhertis from Animal
    def speak(self):
        print("Dog barks")
d = Dog02()
d.speak()

#Example of Multiple Inheritance:
class Animal02:
    def speak(self):
        print("Animal speaks")

class Walker02:
    def walk(self):
        print("Walking...")

class Dog03(Animal02, Walker02):  # Inheriting from both Animal and Walker
    def bark(self):
        print("Dog barks")

d = Dog03()
d.speak()   # From Animal
d.walk()    # From Walker
d.bark()    # Defined in Dog


#Polymorphism
#Same method name but different depending on the object.
class Cat01:
    def sound(self):
        print("Meow")

class Dog01:
    def sound(self):
        print("Bark")

def make_sound(animal):
    animal.sound()
make_sound(Cat01()) #output: Meow
make_sound(Dog()) #Output: Bark


#Abstraction
#Hidding complex implementation and showing only the necessary parts. Often achived using abstract classes.






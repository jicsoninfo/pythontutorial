print("""
      🧠 What is OOP?
Object-Oriented Programming (OOP) is a programming paradigm based on the concept of objects, which contain data (attributes) and methods (functions).

📘 Key OOP Concepts in Python
Class and Object

Encapsulation

Inheritance

Polymorphism

Abstraction

1. ✅ Class and Object
Class: Blueprint for creating objects.

Object: Instance of a class.

python
Copy
Edit
class Dog:
    def __init__(self, name):
        self.name = name

    def bark(self):
        print(f"{self.name} says Woof!")

# Create an object
my_dog = Dog("Buddy")
my_dog.bark()  # Output: Buddy says Woof!
2. ✅ Encapsulation
Hiding internal details and exposing only what’s necessary.

python
Copy
Edit
class Account:
    def __init__(self, balance):
        self.__balance = balance  # private variable

    def deposit(self, amount):
        self.__balance += amount

    def get_balance(self):
        return self.__balance

acc = Account(1000)
acc.deposit(500)
print(acc.get_balance())  # Output: 1500
# print(acc.__balance) -> This would raise an AttributeError
3. ✅ Inheritance
One class (child) can inherit attributes and methods from another (parent).

python
Copy
Edit
class Animal:
    def speak(self):
        print("Animal speaks")

class Dog(Animal):  # Dog inherits from Animal
    def speak(self):
        print("Dog barks")

d = Dog()
d.speak()  # Output: Dog barks
4. ✅ Polymorphism
Same method name but different behavior depending on the object.

python
Copy
Edit
class Cat:
    def sound(self):
        print("Meow")

class Dog:
    def sound(self):
        print("Bark")

def make_sound(animal):
    animal.sound()

make_sound(Cat())  # Output: Meow
make_sound(Dog())  # Output: Bark
5. ✅ Abstraction
Hiding complex implementation and showing only the necessary parts. Often achieved using abstract classes.

python
Copy
Edit
from abc import ABC, abstractmethod

class Shape(ABC):
    @abstractmethod
    def area(self):
        pass

class Circle(Shape):
    def __init__(self, radius):
        self.radius = radius

    def area(self):
        return 3.14 * self.radius ** 2

c = Circle(5)
print(c.area())  # Output: 78.5
🧾 Summary Table
Concept	Meaning	Example Class
Class/Object	Structure & instance	Dog, my_dog
Encapsulation	Hiding data	__balance
Inheritance	Child inherits from parent	Dog(Animal)
Polymorphism	Same method, different class behavior	sound()
Abstraction	Hiding internal logic (via abstract classes)	Shape
      

      ✅ 1. Public Variable and Method
Accessible from anywhere.

python
Copy
Edit
class Person:
    def __init__(self, name):
        self.name = name  # Public variable

    def say_hello(self):  # Public method
        print(f"Hello, I am {self.name}")
Usage:

python
Copy
Edit
p = Person("Alice")
print(p.name)        # ✅ Allowed
p.say_hello()        # ✅ Allowed
✅ 2. Protected Variable and Method
Indicated by a single underscore _. It's a convention — not enforced — that this should be accessed only within the class and subclasses.

python
Copy
Edit
class Employee:
    def __init__(self, name):
        self._name = name  # Protected variable

    def _display(self):  # Protected method
        print(f"Employee: {self._name}")
Usage:

python
Copy
Edit
e = Employee("Bob")
print(e._name)        # ⚠️ Possible but discouraged
e._display()          # ⚠️ Possible but discouraged
✅ 3. Private Variable and Method
Indicated by double underscore __. This triggers name mangling to make access harder.

python
Copy
Edit
class BankAccount:
    def __init__(self, balance):
        self.__balance = balance  # Private variable

    def __show_balance(self):  # Private method
        print(f"Balance: {self.__balance}")

    def access_balance(self):  # Public method to access private one
        self.__show_balance()
      

      
      


      Python’s Access Control (By Convention)
Python does not have strict access modifiers like public, protected, or private as in Java or C++. But it follows naming conventions to indicate the intended access level:

Access Level	Syntax Prefix	Meaning
Public	name	Accessible from anywhere
Protected	_name	Intended for subclasses
Private	__name	Name-mangled, hard to access outside
      
      ✅ 1. Public Variable and Method
Accessible from anywhere.
      ✅ 2. Protected Variable and Method
Indicated by a single underscore _. It's a convention — not enforced — that this should be accessed only within the class and subclasses.
      
      ✅ 3. Private Variable and Method
Indicated by double underscore __. This triggers name mangling to make access harder.""")

class Car:
    def __init__(self):
        self.brand = "Toyota"         # public
        self._engine = "V6"           # protected
        self.__vin_number = "123ABC"  # private

    def _start_engine(self):  # protected method
        print("Engine started")

    def __display_vin(self):  # private method
        print(f"VIN: {self.__vin_number}")

    def show_details(self):   # public method accessing all
        self._start_engine()
        self.__display_vin()

c = Car()
print(c.brand)        # ✅ Public
print(c._engine)      # ⚠️ Protected
# print(c.__vin_number)  ❌ Error
c.show_details()      # ✅ Accesses protected & private correctly

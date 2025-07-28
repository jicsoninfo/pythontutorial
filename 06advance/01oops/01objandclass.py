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
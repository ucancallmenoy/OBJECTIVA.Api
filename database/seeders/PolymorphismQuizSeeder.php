<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PolymorphismQuiz;

class PolymorphismQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PolymorphismQuiz::insert([
            [
                'question' => "What does polymorphism mean in programming?",
                'a' => "The ability to change data types",
                'b' => "The ability of one type to take multiple forms",
                'c' => "A way to write complex code",
                'd' => "A method to override parent classes",
                'correct' => "b",
                'explanation' => "Polymorphism allows objects to be treated as instances of their parent class or as their own class. This flexibility is a key feature of object-oriented programming.",
                'code' => null,
            ],
            [
                'question' => "Name the two types of polymorphism in Java.",
                'a' => "Static and Dynamic",
                'b' => "Early and Late",
                'c' => "Compile-time and Runtime",
                'd' => "Both A and C",
                'correct' => "d",
                'explanation' => "Static polymorphism is resolved at compile time, while dynamic polymorphism is resolved at runtime.",
                'code' => null,
            ],
            [
                'question' => "What is another name for static polymorphism?",
                'a' => "Runtime Polymorphism",
                'b' => "Late Binding",
                'c' => "Compile-time Polymorphism",
                'd' => "Method Overriding",
                'correct' => "c",
                'explanation' => "Static polymorphism is also known as compile-time polymorphism because method resolution occurs during compilation.",
                'code' => null,
            ],
            [
                'question' => "What is another name for dynamic polymorphism?",
                'a' => "Compile-time Polymorphism",
                'b' => "Method Overloading",
                'c' => "Runtime Polymorphism",
                'd' => "Early Binding",
                'correct' => "c",
                'explanation' => "Dynamic polymorphism is also known as runtime polymorphism because method resolution occurs during program execution.",
                'code' => null,
            ],
            [
                'question' => "What is method overloading?",
                'a' => "Defining methods with the same name but different parameters",
                'b' => "Overriding methods from a parent class",
                'c' => "Using methods without parameters",
                'd' => "None of the above",
                'correct' => "a",
                'explanation' => "Method overloading allows multiple methods with the same name but different parameters to be defined in the same class.",
                'code' => null,
            ],
            [
                'question' => "How does constructor overloading differ from method overloading?",
                'a' => "Constructor overloading doesn't exist",
                'b' => "Constructor overloading applies to constructors only",
                'c' => "Method overloading applies to constructors only",
                'd' => "Both are the same",
                'correct' => "b",
                'explanation' => "Constructor overloading allows multiple constructors with different parameters to be defined in the same class.",
                'code' => null,
            ],
            [
                'question' => "Does Java support operator overloading explicitly?",
                'a' => "Yes",
                'b' => "No",
                'c' => "Only for addition",
                'd' => "Only for subtraction",
                'correct' => "b",
                'explanation' => "Java does not support operator overloading for user-defined classes, unlike some other languages like C++.",
                'code' => null,
            ],
            [
                'question' => "What is type promotion in method overloading?",
                'a' => "Converting a large data type to a smaller one",
                'b' => "Automatically converting a smaller data type to a larger one",
                'c' => "Promoting methods to the parent class",
                'd' => "None of the above",
                'correct' => "b",
                'explanation' => "Type promotion in method overloading automatically converts smaller data types to larger ones to match the method signature.",
                'code' => null,
            ],
            [
                'question' => "What is method overriding?",
                'a' => "Methods sharing the same name and parameters in different classes",
                'b' => "Methods in the same class with different parameters",
                'c' => "Methods in the same class with no parameters",
                'd' => "None of the above",
                'correct' => "a",
                'explanation' => "Method overriding occurs when a subclass provides a specific implementation of a method defined in its parent class.",
                'code' => null,
            ],
            [
                'question' => "What determines which overridden method is executed at runtime?",
                'a' => "The reference type",
                'b' => "The actual object type",
                'c' => "The compiler",
                'd' => "None of the above",
                'correct' => "b",
                'explanation' => "The actual object type determines which overridden method is executed at runtime, not the reference type.",
                'code' => null,
            ],
            [
                'question' => "What is the output of the following code about the zoo management system scenario?",
                'a' => "Bark",
                'b' => "Some generic animal sound",
                'c' => "Meow",
                'd' => "Compilation error",
                'correct' => "b",
                'explanation' => "The code demonstrates polymorphism by calling the makeSound method of the Dog class through a reference to the Animal class.",
                'code' => 'class Animal {
    public void makeSound() {
        System.out.println("Some generic animal sound");
    }
}

class Dog extends Animal {
    @Override
    public void makeSound() {
        System.out.println("Bark");
    }
}

public class Main {
    public static void main(String[] args) {
        Animal animal = new Dog(); // Polymorphism: Parent reference, child object
        animal.makeSound();
    }
}',
            ],
            [
                'question' => "What is the output of the following code about the payment system scenario?",
                'a' => "Processing generic payment",
                'b' => "Error: Method not found",
                'c' => "Processing credit card payment",
                'd' => "Compilation error",
                'correct' => "c",
                'explanation' => "The code demonstrates polymorphism by calling the processPayment method of the CreditCard class through a reference to the Payment class.",
                'code' => 'class Payment {
    public void processPayment() {
        System.out.println("Processing generic payment");
    }
}

class CreditCard extends Payment {
    @Override
    public void processPayment() {
        System.out.println("Processing credit card payment");
    }
}

public class Main {
    public static void main(String[] args) {
        Payment payment = new CreditCard(); // Polymorphism: Parent reference, child object
        payment.processPayment();
    }
}',
            ],
            [
                'question' => "What is the output of the following code about the online store scenario?",
                'a' => "Applying general discount",
                'b' => "Applying seasonal discount",
                'c' => "No discount applied",
                'd' => "Compilation error",
                'correct' => "b",
                'explanation' => "The code demonstrates polymorphism by calling the applyDiscount method of the SeasonalDiscount class through a reference to the Discount class.",
                'code' => 'class Discount {
    public void applyDiscount() {
        System.out.println("Applying general discount");
    }
}

class SeasonalDiscount extends Discount {
    @Override
    public void applyDiscount() {
        System.out.println("Applying seasonal discount");
    }
}

public class Main {
    public static void main(String[] args) {
        Discount discount = new SeasonalDiscount(); // Polymorphism: Parent reference, child object
        discount.applyDiscount();
    }
}',
            ],
            [
                'question' => "What is the output of the following code about the transportation system scenario?",
                'a' => "Starting vehicle engine",
                'b' => "Starting car engine",
                'c' => "Engine not started",
                'd' => "Compilation error",
                'correct' => "b",
                'explanation' => "The code demonstrates polymorphism by calling the startEngine method of the Car class through a reference to the Vehicle class.",
                'code' => 'class Vehicle {
    public void startEngine() {
        System.out.println("Starting vehicle engine");
    }
}

class Car extends Vehicle {
    @Override
    public void startEngine() {
        System.out.println("Starting car engine");
    }
}

public class Main {
    public static void main(String[] args) {
        Vehicle vehicle = new Car(); // Polymorphism: Parent reference, child object
        vehicle.startEngine();
    }
}',
            ],
            [
                'question' => "What is the output of the following code in the company scenario?",
                'a' => "Employee is working",
                'b' => "Compilation error",
                'c' => "Employee is managing the team",
                'd' => "Manager is managing the team",
                'correct' => "d",
                'explanation' => "The code demonstrates polymorphism by calling the work method of the Manager class through a reference to the Employee class.",
                'code' => 'class Employee {
    public void work() {
        System.out.println("Employee is working");
    }
}
class Manager extends Employee {
    @Override
    public void work() {
        System.out.println("Manager is managing the team");
    }
}
public class Main {
    public static void main(String[] args) {
        Employee employee = new Manager(); // Polymorphism: Parent reference, child object
        employee.work();
    }
}',
            ],
            [
                'question' => "What is the output of the following code about the media player scenario?",
                'a' => "Playing media",
                'b' => "Playing audio file",
                'c' => "Playing audio file Playing video file",
                'd' => "Playing media Playing media",
                'correct' => "c",
                'explanation' => "The code demonstrates polymorphism by calling the play method of the Audio and Video classes through references to the Media class.",
                'code' => 'class Media {
    public void play() {
        System.out.println("Playing media");
    }
}
class Audio extends Media {
    @Override
    public void play() {
        System.out.println("Playing audio file");
    }
}
class Video extends Media {
    @Override
    public void play() {
        System.out.println("Playing video file");
    }
}
public class Main {
    public static void main(String[] args) {
        Media media1 = new Audio();  // Polymorphism: Parent reference, Audio object
        Media media2 = new Video();  // Polymorphism: Parent reference, Video object
        
        media1.play();
        media2.play();
    }
}',
            ],
            [
                'question' => "Which of the following cannot be used as a return type for method overriding?",
                'a' => "Covariant types",
                'b' => "Primitive data types",
                'c' => "Unrelated types",
                'd' => "Abstract classes",
                'correct' => "c",
                'explanation' => "Method overriding requires a return type that is a subclass of the parent class method's return type.",
                'code' => null,
            ],
            [
                'question' => "What happens if the overridden method in the parent class throws an exception, but the child class method does not?",
                'a' => "Compilation error",
                'b' => "It is allowed",
                'c' => "The exception is ignored",
                'd' => "Runtime error",
                'correct' => "b",
                'explanation' => "A child class method can throw fewer exceptions or no exceptions compared to the parent class method.",
                'code' => null,
            ],
            [
                'question' => "Which type of polymorphism is implemented using interfaces in Java?",
                'a' => "Static",
                'b' => "Dynamic",
                'c' => "Compile-time",
                'd' => "None of the above",
                'correct' => "b",
                'explanation' => "Dynamic polymorphism is achieved through method overriding, which is often implemented using interfaces in Java.",
                'code' => null,
            ],
            [
                'question' => "What is the role of the super keyword in method overriding?",
                'a' => "Calls the parent class's method.",
                'b' => "Prevents overriding.",
                'c' => "Refers to the current object.",
                'd' => "Creates a new method.",
                'correct' => "a",
                'explanation' => "The super keyword is used to call the parent class's method from the child class's overridden method.",
                'code' => null,
            ],
            [
                'question' => "Why can't private methods be overridden?",
                'a' => "They are static.",
                'b' => "They are final by default.",
                'c' => "They are not visible in subclasses.",
                'd' => "None of the above.",
                'correct' => "c",
                'explanation' => "Private methods are not visible in subclasses, so they cannot be overridden.",
                'code' => null,
            ],
            [
                'question' => "How does polymorphism promote scalability in software?",
                'a' => "By allowing hardcoding",
                'b' => "By supporting dynamic behavior",
                'c' => "By limiting flexibility",
                'd' => "By avoiding inheritance",
                'correct' => "b",
                'explanation' => "Polymorphism allows for dynamic behavior, making software more adaptable to changes and scalable.",
                'code' => null,
            ],
            [
                'question' => "Which design principle is directly supported by polymorphism?",
                'a' => "Encapsulation",
                'b' => "Code reuse",
                'c' => "Open-Closed Principle",
                'd' => "Single Responsibility Principle",
                'correct' => "c",
                'explanation' => "The Open-Closed Principle states that software entities should be open for extension but closed for modification, which is supported by polymorphism.",
                'code' => null,
            ],
            [
                'question' => "Why is polymorphism considered an OOP pillar?",
                'a' => "It is unique to Java.",
                'b' => "It integrates other OOP concepts.",
                'c' => "It is used in procedural programming.",
                'd' => "It works without objects.",
                'correct' => "b",
                'explanation' => "Polymorphism is a key feature of object-oriented programming that integrates with other OOP concepts like inheritance and encapsulation.",
                'code' => null,
            ],
            [
                'question' => "Which of the following can break polymorphism?",
                'a' => "Final methods",
                'b' => "Interfaces",
                'c' => "Abstract classes",
                'd' => "Method overloading",
                'correct' => "a",
                'explanation' => "Final methods cannot be overridden, which can break polymorphism by restricting dynamic behavior.",
                'code' => null,
            ],
            [
                'question' => "What is required to implement polymorphism in real-world applications?",
                'a' => "Using static methods only",
                'b' => "Having a parent-child class relationship",
                'c' => "Avoiding dynamic behavior",
                'd' => "Using primitive types",
                'correct' => "b",
                'explanation' => "Polymorphism is implemented through inheritance and method overriding, which require a parent-child class relationship.",
                'code' => null,
            ],
            [
                'question' => "What does it mean if a reference variable is 'polymorphic'?",
                'a' => "It can hold objects of different types.",
                'b' => "It is restricted to one type only.",
                'c' => "It cannot access overridden methods.",
                'd' => "It is only used for interfaces.",
                'correct' => "a",
                'explanation' => "A polymorphic reference variable can hold objects of different types, allowing for dynamic behavior.",
                'code' => null,
            ],
            [
                'question' => "Which of these is an example of dynamic polymorphism?",
                'a' => "A method overloaded in the same class",
                'b' => "A subclass overriding a parent class method",
                'c' => "A method with no parameters",
                'd' => "A private method",
                'correct' => "b",
                'explanation' => "Dynamic polymorphism occurs when a subclass provides a specific implementation of a method defined in its parent class.",
                'code' => null,
            ],
            [
                'question' => "Why is method overriding commonly used in frameworks?",
                'a' => "To simplify object creation",
                'b' => "To allow customization of behavior",
                'c' => "To eliminate inheritance",
                'd' => "To restrict dynamic behavior",
                'correct' => "b",
                'explanation' => "Method overriding allows subclasses to provide specific implementations of parent class methods, enabling customization of behavior in frameworks.",
                'code' => null,
            ],
            [
                'question' => "What happens when an overridden method in a child class is called using a parent class reference?",
                'a' => "The parent's version is executed.",
                'b' => "The child's version is executed.",
                'c' => "Both versions are executed.",
                'd' => "Compilation error.",
                'correct' => "b",
                'explanation' => "When an overridden method is called using a parent class reference, the child class's version is executed due to dynamic polymorphism.",
                'code' => null,
            ],
            [
                'question' => "Which keyword should be used to avoid breaking polymorphism in a subclass?",
                'a' => "final",
                'b' => "static",
                'c' => "protected",
                'd' => "private",
                'correct' => "c",
                'explanation' => "The protected keyword allows subclasses to access and override methods without breaking polymorphism.",
                'code' => null,
            ],
            [
                'question' => "How does polymorphism simplify API design?",
                'a' => "By supporting fixed behavior",
                'b' => "By allowing a single interface for multiple implementations",
                'c' => "By avoiding inheritance",
                'd' => "By promoting static methods",
                'correct' => "b",
                'explanation' => "Polymorphism simplifies API design by allowing a single interface to be used for multiple implementations, promoting flexibility and code reuse.",
                'code' => null,
            ],
            [
                'question' => "Which keyword prevents a method from being overridden?",
                'a' => "final",
                'b' => "static",
                'c' => "protected",
                'd' => "private",
                'correct' => "a",
                'explanation' => "The final keyword prevents a method from being overridden in a subclass, ensuring fixed behavior.",
                'code' => null,
            ]
        ]);
    }
}

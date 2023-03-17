# b2broker
 php test b2broker

Factory model: The AccountManagerclass acts as a factory to create instances of the Accountclass. 
This pattern allows us to encapsulate the creation of objects and provides a way to create objects without exposing the creation logic to the client.

Singleton pattern: The AccountManager class is implemented as a singleton to ensure that there is only one instance of the class in the system. This pattern is useful when we want to restrict the instantiation of a class to a single object and provide a global access point to that object.

Strategy model: The Transaction class uses the strategy model to allow different types of transactions (deposit, withdrawal and transfer). This model allows us to define a family of algorithms, to encapsulate each of them and to make them interchangeable. In this case, the algorithm is the way the transaction is carried out.
Ordering Pattern: The Transactionclass can also be thought of as an implementation of the Ordering Pattern. Each transaction is represented as a command object, which encapsulates all the information needed to complete the transaction. This pattern allows us to decouple the object that invokes the operation from the one that knows how to execute it.

Iterator pattern: The TransactionListclass implements the iterator pattern to allow easy traversal of the list of transactions. This pattern provides a way to sequentially access the elements of an aggregate object without exposing its underlying representation.

Strategy model (again): The Accountclass uses the strategy model to allow different ways of sorting transactions (by comment or by date). This model allows us to define a family of algorithms, to encapsulate each of them and to make them interchangeable. In this case, the algorithm is how transactions are sorted.
Observer pattern: Although not explicitly used in the implementation, the observer pattern can be used to notify other parts of the system when a transaction is performed. For example, we could create an EmailNotifier class which is notified when a transaction occurs and sends an email to the account holder.
This model enables loosely coupled communication between objects and reduces the amount of coupling between them.

<?php 

// Create an instance of the AccountManager class
$account_manager = new AccountManager();

// Create some accounts
$account1 = $account_manager->create_account("Loic Ernest", 1000.00);
$account2 = $account_manager->create_account("Jane Smith", 500.00);

// Perform some operations on the accounts
$account1->deposit("Salary", 2000.00, "2023-03-01");
$account1->transfer("Rent payment", 500.00, "2023-03-05", $account2);
$account2->withdraw("Grocery shopping", 100.00, "2023-03-10");

// Get the balance of an account
echo "Balance of Account 1: " . $account_manager->get_balance($account1->get_account_number()) . "<br>";

// Get all accounts in the system
$accounts = $account_manager->get_all_accounts();

// Print the account information
foreach ($accounts as $account) {
    echo "Account Number: " . $account->get_account_number() . "<br>";
    echo "Account Holder: " . $account->get_account_holder() . "<br>";
    echo "Balance: " . $account_manager->get_balance($account->get_account_number()) . "<br>";
    echo "<br>";
}

// Get all transactions for an account sorted by comment
$transactions = $account1->get_transactions_sorted_by_comment();
foreach ($transactions as $transaction) {
    echo $transaction->comment . " - " . $transaction->amount . " - " . $transaction->due_date . "<br>";
}

// Get all transactions for an account sorted by date
$transactions = $account1->get_transactions_sorted_by_date();
foreach ($transactions as $transaction) {
    echo $transaction->comment . " - " . $transaction->amount . " - " . $transaction->due_date . "<br>";
}


/* 
In this example, we first create an instance of the AccountManager class. We then create two accounts using the create_account() method, then we perform certain operations on them using the deposit(), transfer() and withdraw() methods. We then use get_balance(), the method to get the balance of an account.
Next, we use get_all_accounts(), the method to retrieve an array of all accounts in the system, and iterate through the array to print each account's information.
Finally, we use the get_transactions_sorted_by_comment() and get_transactions_sorted_by_date() methods to retrieve an array of transactions for an account sorted by comment and date, respectively, and loop through the arrays to print each transaction's information
 */

?>
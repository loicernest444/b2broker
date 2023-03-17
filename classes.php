<?php 

class Transaction {
    public $comment;
    public $amount;
    public $due_date;

    public function __construct($comment, $amount, $due_date) {
        $this->comment = $comment;
        $this->amount = $amount;
        $this->due_date = $due_date;
    }
}

class Account {
    private $account_number;
    private $balance;
    private $transactions;

    public function __construct($account_number, $balance = 0) {
        $this->account_number = $account_number;
        $this->balance = $balance;
        $this->transactions = array();
    }

    //deposit update the actual balance by increase with the actual amount
    public function deposit($comment, $amount, $due_date) {
        $this->balance += $amount;
        $this->transactions[] = new Transaction($comment, $amount, $due_date);
    }

    //withdraw update the actual balance by rmeoving the actual amount is funds are sufficients
    public function withdraw($comment, $amount, $due_date) {
        if ($amount > $this->balance) {
            throw new Exception("Insufficient funds");
        }
        $this->balance -= $amount;
        $this->transactions[] = new Transaction($comment, -$amount, $due_date);
    }

     //transfer money from one account to another
    public function transfer($comment, $amount, $due_date, $recipient_account) {
        if ($amount > $this->balance) {
            throw new Exception("Insufficient funds");
        }
        $this->balance -= $amount;
        $recipient_account->deposit($comment, $amount, $due_date);
        $this->transactions[] = new Transaction($comment, -$amount, $due_date);
    }

    public function get_balance() {
        return $this->balance;
    }

    public function get_transactions_sorted_by_comment() {
        usort($this->transactions, function($a, $b) {
            return strcmp($a->comment, $b->comment);
        });
        return $this->transactions;
    }

    public function get_transactions_sorted_by_date() {
        usort($this->transactions, function($a, $b) {
            return $a->due_date <=> $b->due_date;
        });
        return $this->transactions;
    }
}

class AccountManager {
    private $accounts;

    public function __construct() {
        $this->accounts = array();
    }

    public function create_account($account_number, $balance = 0) {
        $this->accounts[$account_number] = new Account($account_number, $balance);
    }

    public function get_account($account_number) {
        if (!isset($this->accounts[$account_number])) {
            throw new Exception("Account not found");
        }
        return $this->accounts[$account_number];
    }

    public function get_all_accounts() {
        return $this->accounts;
    }
}


?>
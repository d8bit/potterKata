<?php

/**
 * This file contains Basket class
 */


class Basket
{
    private $_books = [];

    const PRICE = 8;

    /**
     * Adds a book
     *
     * @param string $title Title of the book
     *
     * @return void
     */
    public function addBook($title)
    {
        $inserted = false;
        if ($this->_cartIsEmpty()) {
            $this->_books[0][] = $title;
        } else {
            for ($i = 0; $i < count($this->_books); $i++) {
                if (!in_array($title, $this->_books[$i])) {
                    $this->_books[$i][] = $title;
                    $inserted = true;
                    break;
                }
            }
            if (!$inserted) {
                $this->_books[count($this->_books)][] = $title;
            }
        }

    }

    /**
     * Checks if cart is empty
     *
     * @return boolean
     */
    private function _cartIsEmpty()
    {
        return (count($this->_books) == 0);
    }

    /**
     * Returns books
     *
     * @return array Array of books
     */
    public function getBooks()
    {
        return $this->_books;
    }

    /**
     * Return number of books
     *
     * @return int
     */
    public function getBooksNumber()
    {
        $num = 0;
        foreach ($this->_books as $books_number) {
            $num += count($books_number);
        }
        return $num;
    }

    /**
     * Get total account
     *
     * @return int
     */
    public function getTotal()
    {
        $total = 0;
        foreach ($this->_books as $group_books) {
            $n_distinct_books = count($group_books);
            $total_group = count($group_books) * self::PRICE;

            switch($n_distinct_books) {
            case 2:
                $total_group = $total_group * 0.95;
                break;
            case 3:
                $total_group = $total_group * 0.90;
                break;
            case 4:
                $total_group = $total_group * 0.80;
                break;
            case 5:
                $total_group = $total_group * 0.75;
                break;
            }
            $total += $total_group;
        }

        return number_format($total, 2);
    }

}

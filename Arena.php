<?php

class Arena {

    protected $first;
    protected $second;
    protected $lastAttacker = null;

    public function __construct($fighter1, $fighter2) {
        $this->initiativeTest($fighter1, $fighter2);
    }

    protected function initiativeTest($fighter1, $fighter2) {
        if($fighter1->initiative() > $fighter2->initiative()){
            $this->first  = $fighter1;
            $this->second = $fighter2;
        } elseif($fighter1->initiative() < $fighter2->initiative()) {
            $this->first = $fighter2;
            $this->second = $fighter1;
        } else {
            $this->initiativeTest($fighter1, $fighter2);
        }
    }

    public function fight() {
        while ($this->first->getHealthPoints() > 0 AND $this->second->getHealthPoints() > 0) {
            $both_alive = $this->nextTurn();
            if($both_alive === false) {
                break;
            }
        }
        return $this->lastAttacker;
    }

    private function nextTurn() {
        if($this->lastAttacker == $this->first) {
            $this->lastAttacker = $this->second;
            return $this->second->attack($this->first);
        } else {
            $this->lastAttacker = $this->first;
            return $this->first->attack($this->second);
        }
        echo "Next turn, last attacker " . get_class($this->lastAttacker) . PHP_EOL;
    }
}
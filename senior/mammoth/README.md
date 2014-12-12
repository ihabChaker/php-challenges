Read and write to Test::$secret before it's output.
======================================

## Rules
1. No use of Reflection API / runkit extension
2. No stopping execution before Test::run()
3. No Exceptions or PHP errors / warnings notices allowed
4. No redefining $test

## Hints
1. Caesar
2. Magic methods
3. Requires a new feature of PHP 5.4
#! /bin/bash

echo 'Hello, World';

echo "";

echo "===== ARGS =====";

for i in $*;do
  echo $i;
done
echo "----------------";

echo "===== STDIN =====";
read INPUT <&0
echo "$INPUT"
echo "----------------";


echo "===== ENV =====";
env | sort
echo "----------------";


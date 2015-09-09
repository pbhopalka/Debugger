var=$1
fname=${var%.*}
ext=".out"
ext1=".ans"
ext2=".o"
gcc -Wall -o "/home/anant/debugger/submissions/$fname.o" "/home/anant/debugger/submissions/$var"
#chmod +x "../submissions/$fname.o"
#timeout 2 ./"../submissions/$fname.o" > "../submissions/$fname.out"
#echo diff -U 0 --ignore-all-space "$fname.out" "$2$3.ans" | grep ^@ | wc -l

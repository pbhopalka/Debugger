var=$1
fname=$2
#echo "fname",$fname
#echo "var",$var
#ext=".out"
#ext1=".ans"
#ext2=".o"
#echo "Compiling " "$fname.o " "$var"
g++ -o "$var" "$fname"
#chmod +x "$fname.o"
#timeout 2 ./"$fname.o" > "$fname.out"
#echo diff -U 0 --ignore-all-space "$fname.out" "$2$3.ans" | grep ^@ | wc -l

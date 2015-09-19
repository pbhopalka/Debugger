var=$1
fname=${var%.*}
echo $fname
echo "HI",$var
ext=".out"
ext1=".ans"
ext2=".o"
echo "Compiling"
gcc -Wall -o "$fname.o" "$var"
#chmod +x "$fname.o"
#timeout 2 ./"$fname.o" > "$fname.out"
#echo diff -U 0 --ignore-all-space "$fname.out" "$2$3.ans" | grep ^@ | wc -l

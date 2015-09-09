chmod +x "/home/b2012/anant_b120519cs/debugger/submissions/$1"
timeout 2 "/home/b2012/anant_b120519cs/debugger/submissions/$1" > "/home/b2012/anant_b120519cs/debugger/submissions/$2"
echo diff -U 0 --ignore-all-space "/home/b2012/anant_b120519cs/debugger/submissions/$1" "/home/b2012/anant_b120519cs/debugger/submissions/$3" | grep ^@ | wc -l

chmod +x "submissions/$1"
timeout 2 "submissions/$1" > "submissions/$2"
echo diff -U 0 --ignore-all-space "submissions/$1" "submissions/$3" | grep ^@ | wc -l

# ensure running as root
if [ "$(id -u)" != "0" ]; then
    #Debian doesnt have sudo if root has a password.
    if ! hash sudo 2>/dev/null; then
        exec su -c "$0" "$@"
    else
        exec sudo "$0" "$@"
    fi
fi

wget https://raw.githubusercontent.com/jozour/jozour-it/master/jozourit.sh
chmod 744 jozourit.sh
./jozourit.sh 2>&1 | tee -a /var/log/jozourit-install.log
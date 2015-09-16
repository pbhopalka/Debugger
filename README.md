# Debugger

Debugger is a debugging event conducted by National Institute of Technology Calicut
during its annual techno-management fest, [Tathva](http://www.tathva.org).

This is the software that was used as a platform to run user programs and evaluate
their solutions.

## Running the above platform

If you would like to run this platform on your own machine, then the database has to
be set up properly. For this in the MySql interface, the file [gob.sql](https://github.com/pbhopalka/Debugger/blob/master/gob.sql)
has to be run and then data needs to be added into the database accordingly.

Also, inside the `/includes/config.ini` file, the server name, database name, sql id
and sql password needs to be saved based on where you are hosting this platform and
where your database is stored.

## Manager platform

There's a separate platform for manager to use the database effectively removing the
hassle of the event manager to have an extensive knowledge of the underlying database.

## Some information

`/includes/config.ini` and `/includes/connection.php` have not been added due to security
reasons. Once the platform is completed, it will be added.

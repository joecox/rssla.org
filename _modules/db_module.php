<?php /* DATABASE MODULE -- db_module.php */

    // Global database handle
    $dbh;

    function db_connect ()
    {
        $db_user = 'uclarss_root';
        $db_pw = 'SE~atBn^d_P&';
        $db_name = 'uclarss_db1';
        $dsn = 'mysql:host=localhost;dbname='.$db_name;
        global $dbh;

        $dbh = new PDO($dsn, $db_user, $db_pw);
    }

    function db_select ($query)
    {
        global $dbh;

        $stmt = $dbh->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function db_select_all ($table)
    {
        global $dbh;

        $query = 'SELECT * FROM '.$table;
        $stmt = $dbh->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function db_insert ($query)
    {
        global $dbh;

        $affected_rows = $dbh->exec($query);
        return $affected_rows;
    }

    function db_close()
    {
        global $dbh;
        $dbh = null;
    }

    function last_insert_id()
    {
        global $dbh;
        return $dbh->lastInsertId();
    }

?>
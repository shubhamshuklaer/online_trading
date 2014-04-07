#Steps
1. Require class.MySQL.php  -- require_once "class.MySQL.php";
2. Create a new MySQL object -- $omysql=new MySQL();

#Attributes
1. $lastError -- Holds the last error
2. $lastQuery -- Holds the last query
3. $result -- Holds the MySQL query result
4. $records -- Holds the total number of records returned
5. $affected -- Holds the total number of records affected
6. $arrayedResult --  Holds an array of the result


# Improtant functions

where clause will be of format array("user_nm NOT LIKE"=>"shubham","AND num_reps ="=>"2")
1.	function ExecuteSQL($query)

2.	function Insert($vars, $table, $exclude = '')

3.	function Delete($table, $where='', $limit='')

4.	function Select($from, $where='', $orderBy='', $limit='',$cols='*')// eg of $orderby "colname1,colname2 DESC" ,DESC for decending ordering and ASC for accending

5.	function Update($table, $set, $where, $exclude = '')



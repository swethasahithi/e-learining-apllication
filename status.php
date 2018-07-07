<?php 
//$conn = new mysqli($servername, $username, $password,$dbname);

function logoutstatus($ulbid,$conn)
{
    $sql="update ustatus set status=0 where uid={$ulbid}";
    $result=$conn->query($sql);
    return $result;

}
function loginstatus($ulbid,$conn)
{
    $sql="update ustatus set status=1 where uid={$ulbid}";
    $result=$conn->query($sql);
    return $result;   
}
function getnumberofusersonline($conn)
{
       $sql="select count(uid) as c from ustatus where status=1";
       $result=$conn->query($sql);
       $rows=$result->fetch_all(MYSQLI_ASSOC);
       return $rows[0]["c"];

}
//echo loginstatus(1,$conn);
//echo getnumberofusersonline($conn);

?>
function find Dvd($title)
{
    $query="SELECT *FROM dvd
            Where title LIKE '%{$title}%'";
    return dbExecute ($query);
}
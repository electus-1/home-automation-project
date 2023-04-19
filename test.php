$file = 'mockData.txt';

//get the data from the specified file
$fullData = file_get_contents($file);
echo $fullData;
$dataArray = explode(',', $users);
echo $dataArray;

https://www.phind.com/search?cache=e140ed5e-7efb-478e-b56b-1755dd7cc231
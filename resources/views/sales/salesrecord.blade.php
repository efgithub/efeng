<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>salesrecord</title>
</head>
<body>
    <form action="" method="post">
        {{csrf_field()}}
        案號 EF-
        <input type="text" size="10" name="OrderNo">
        <select name="OrderYear" id="">
        <option value="2021" selected>2021</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
            <option value="2018">2018</option>
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
        </select>
        <select name="OrderMonth" id="">
            <option value="0">整年</option>
            <option value="1">1月</option>
            <option value="2">2月</option>
            <option value="3">3月</option>
            <option value="4">4月</option>
            <option value="5">5月</option>
            <option value="6">6月</option>
            <option value="7">7月</option>
            <option value="8">8月</option>
            <option value="9">9月</option>
            <option value="10">10月</option>
            <option value="11">11月</option>
            <option value="12">12月</option>
        </select>
        <select name="ClientName" id="">
            <option value=""></option>
            @foreach($rs as $rs1)
            <option value="{{$rs1->clientname}}">{{$rs1->clientname}}</option>
            @endforeach
        </select>
        <input type="button" value="搜尋">
        <input type="button" value="新增">
        <input type="button" value="客梯報價分析">
        <input type="button" value="Sakura Dashboard">
        <input type="button" value="登出">
        <table border="1">
            <tr>
                <th>下單日</th>
                <th>客戶名稱</th>
                <th>訂單號號</th>
                <th>案名</th>
                <th>機型</th>
                <th>載重</th>
                <th>速度</th>
                <th>門開</th>
                <th>門寬</th>
                <th>數量</th>
                <th>樓層</th>
                <th>樓停數</th>
                <th>售價</th>
                <th>毛利率</th>
                <th>預計出貨</th>
                <th>實際出貨</th>
                <th>備註</th>
            </tr>
            @foreach($rs as $rs2)
            <tr>
                <td>{{substr($rs2->orderdate,5,2)."-".substr($rs2->orderdate,8,2)."-".'\''.substr($rs2->orderdate,2,2)}}</td>
                <td>{{$rs2->clientname}}</td>
                <td align="center">{{$rs2->orderno}}</td>
                <td>{{$rs2->ordername}}</td>
                <td>{{$rs2->model}}</td>
                <td align="right">{{$rs2->capacity}}</td>
                <td align="right">{{$rs2->speed}}</td>
                <td>{{$rs2->doortype}}</td>
                <td align="right">{{$rs2->doorwidth}}</td>
                <td align="right">{{$rs2->quantity}}</td>
                <td align="right">{{$rs2->floor}}</td>
                <td align="right">{{$rs2->stops}}</td>
                <td align="right">{{$rs2->price}}</td>
                <td align="right">{{$rs2->gross}}</td>
                <td>{{substr($rs2->expectoutdate,5,2)."-".substr($rs2->expectoutdate,8,2)."-".'\''.substr($rs2->expectoutdate,2,2)}}</td>
                <td>{{$rs2->actualoutdate}}</td>
                <td><a href="salesedit/{{$rs2->id}}">Edit</a></td>
            </tr>
            @endforeach
        </table>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>訂單總表修改</title>
    <style>
    div {
        margin: 0 auto;
        width: 80%;
    }
    </style>
</head>
<body>
    <div>
        <form action="../salesediting" method="post">
            {{csrf_field()}}
            <table>
                @foreach($rs[0] as $rs0)
                <tr>
                    <td align="center" colspan="2" style="background-color:#0ff">訂單總表修改</td>
                </tr>
                <tr>
                    <td align="right">案號：</td>
                    <td>
                        {{$rs0->orderno}}
                        <input type="hidden" name="tmpId" value="{{$rs0->id}}">
                    </td>
                </tr>
                <tr>
                    <td align="right">案件名稱：</td>
                    <td>
                        <input name="txtOrderName" type="text" value="{{$rs0->ordername}}">
                        <input name="tmpOrderName" type="hidden" value="{{$rs0->ordername}}">
                    </td>
                </tr>
                <tr>
                    <td align="right">客戶名稱：</td>
                    <td>
                        <input name="txtClientName" type="text" value="{{$rs0->clientname}}">
                        <input name="tmpClientName" type="hidden" value="{{$rs0->clientname}}">
                    </td>
                </tr>
                <tr>
                    <td align="right">型號：</td>
                    <td>
                        <select name="slModel" id="">
                            <option value="other">其他</option>
                            @foreach($rs[1] as $rs1)
                            <option value="{{$rs1->model}}" @if ($rs0->model == $rs1->model) selected @endif>{{$rs1->model}}</option>
                            @endforeach
                        </select>
                        <input name="tmpModel" type="hidden" value="{{$rs0->model}}">
                    </td>
                </tr>
                <tr>
                    <td align="right">載重：</td>
                    <td>
                        <select name="slCapacity" id="">
                            <option value="other">其他</option>
                            @foreach($rs[2] as $rs2)
                            <option value="{{$rs2->capacity}}" @if ($rs0->capacity == $rs2->capacity) selected @endif>{{$rs2->capacity}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="tmpCapacity" value="{{$rs2->capacity}}">
                    </td>
                </tr>
                <tr>
                    <td align="right">速度：</td>
                    <td>
                        <select name="slSpeed" id="">
                            @foreach($rs[3] as $rs3)
                            <option value="{{$rs3->speed}}" @if ($rs0->speed == $rs3->speed) selected @endif>{{$rs3->speed}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="tmpSpeed" value="{{$rs3->speed}}">
                    </td>
                </tr>
                <tr>
                    <td align="right">開門方式：</td>
                    <td>
                        <select name="slDoortype" id="">
                            <option value="other">其他</option>
                            @foreach($rs[4] as $rs4)
                            <option value="{{$rs4->doortype}}" @if ($rs0->doortype == $rs4->doortype) selected @endif>{{$rs4->doortype}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="tmpDoortype" value="{{$rs4->doortype}}">
                    </td>
                </tr>
                <tr>
                    <td align="right">門開大小：</td>
                    <td>
                        <select name="slDoorwidth" id="">
                            @foreach($rs[5] as $rs5)
                            <option value="{{$rs5->doorwidth}}" @if ($rs0->doorwidth == $rs5->doorwidth) selected @endif>{{$rs5->doorwidth}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="tmpDoorwidth" value="{{$rs5->doorwidth}}">
                    </td>
                </tr>
                <tr>
                    <td align="right">數量：</td>
                    <td>{{$rs0->quantity}}</td>
                </tr>
                <tr>
                    <td align="right">樓層：</td>
                    <td>
                        <input name="txtFloor" type="text" value="{{$rs0->floor}}">樓/
                        <input name="txtStops" type="text" value="{{$rs0->stops}}">停
                        <input type="hidden" name="tmpFloor" value="{{$rs0->floor}}">
                        <input type="hidden" name="tmpStops" value="{{$rs0->stops}}">
                    </td>
                </tr>
                <tr>
                    <td align="right">預計出貨日：</td>
                    <td>
                        <input name="txtExpectoutdate" type="date" value="{{substr($rs0->expectoutdate,0,10)}}">
                        <input type="hidden" name="tmpExpectoutdate" value="{{$rs0->expectoutdate}}">
                    </td>
                </tr>
                <tr>
                    <td align="right">售價：</td>
                    <td>
                        <input name="txtPrice" type="text" value="{{$rs0->price}}">
                        <input type="hidden" name="tmpPrice" value="{{$rs0->price}}">
                    </td>
                </tr>
                <tr>
                    <td align="right">美金匯率：</td>
                    <td>
                        <input name="txtExrate" type="text" valus="{{$rs0->exrate}}">
                        <input type="hidden" name="tmpExrate" value="{{$rs0->exrate}}">
                    </td>
                </tr>
                <tr>
                    <td align="right">毛利率：</td>
                    <td>
                        <input name="txtGross" type="text" value="{{$rs0->gross}}">
                        <input type="hidden" name="tmpGross" value="{{$rs0->gross}}">
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <input type="submit" value="修改">
                    </td>
                </tr>
                @endforeach
            </table>
        </form>
    </div>
</body>
</html>
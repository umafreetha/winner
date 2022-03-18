@include('frontend.includes.css')
@include('frontend.includes.header')
<html>
<head>
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
	<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <style>
 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600&display=swap');

* {
  box-sizing: border-box;
}

body {
  font-family: 'Poppins', 'Verdana', sans-serif;
   align-items: center;

  min-height: 100vh;
  color: #444;
}

table {
  width: 100%;
  border-spacing: 0;
  border-radius: 1em;
  overflow: hidden;
}

thead {
 visibility: hidden;
 position: absolute;
 width: 0;
 height: 0;
}

th {
  background: #215A8E;
  color: #fff;
}

td:nth-child(1) {
  background: #215A8E;
  color: #fff;
  border-radius: 1em 1em 0 0;
}

th, td {
  padding: 1em;
}

tr, td {
  display: block;
}

td {
  position: relative;
}

td::before {
  content: attr(data-label);
  position: absolute;
  left: 0;
  padding-left: 1em;
  font-weight: 600;
  font-size: .9em;
  text-transform: uppercase;
}

tr {
  margin-bottom: 1.5em;
  border: 1px solid #ddd;
  border-radius: 1em;
  text-align: right;
}

tr:last-of-type {
  margin-bottom: 0;
}

td:nth-child(n+2):nth-child(odd) {
  background-color: #ddd;
}


@media only screen and (min-width: 768px) {
  
  table {
    max-width: 1200px;
    margin: 0 auto;
    border: 1px solid #ddd;
  }
  
  thead {
    visibility: visible;
    position: relative;
  }
  
  th {
    text-align: left;
    text-transform: uppercase;
    font-size: .9em;
  }
  
  tr {
    display: table-row;
    border: none;
    border-radius: 0;
    text-align: left;
  }
  
  tr:nth-child(even) {
  background-color: #ddd;
}
  
  td {
    display: table-cell;
  }
  
  td::before {
    content: none;
  }
  
  td:nth-child(1) {
    background: transparent;
    color: #444;
    border-radius: 0;
  }
  
  td:nth-child(n+2):nth-child(odd) {
    background-color: transparent;
  }
  
  .a{
     color:black; 
  }
}
</style>
</head>
<body>
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
<table style="margin-top:10%;margin-bottom:10%;">
  
  <thead>
    <th>SI.NO</th>
    <th>Order-id</th>
    <th>Date</th>
    <th>Price</th>
    <th>Status</th>
  
  </thead>
  
  <tbody>
                      @foreach ($order_id as $orderval)
    <tr style="background-color:#80808059;">
      <td data-label="si.no">1</td>
      <td data-label="order-id"><a href="{{url('ordersummary')}}" style="color:black;">{{ $orderval['order_id']}}</a></td>
      <td data-label="date">{{ $orderval['created_at']}}</td>
      <td data-label="price">{{ $orderval['total']}}</td>
      <td data-label="Status">{{ $orderval['status']}}</td>
  
    </tr>
      @endforeach
     
  </tbody>
  
</table>
</body>
</html>
 
@include('frontend.includes.script')
@include('frontend.includes.footer')

@extends('vendor.vendor_dashboard')
@section('vendor')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Vendor All Product</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Vendor All Product:<span class="badge rounded-pill bg-danger"> {{ count($products)}}</span></li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('vendor#addProduct')}}"  class="btn btn-primary" >Add Vendor Product</a>



            </div>
        </div>
    </div>
    <!--end breadcrumb-->


    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>QTY</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $key=> $item)
                        <tr>
                            <td>{{$key+1}}</td>

                            <td><img src="{{asset($item->product_thambnail)}} " style="width:70px; height:40px" alt=""></td>
                            <td>{{$item->product_name}}</td>
                            <td>{{$item->selling_price}}$</td>
                            <td>{{$item->product_qty}}</td>
                            <td>
                                @if($item->discount_price == NULL)
                                <span class="badge rounded-pill bg-info">No Discount</span>
                                @else
                                @php
                                    $amount = ($item->selling_price) - ($item->discount_price);
                                    $discount = ($amount/$item->selling_price) * 100;
                                @endphp
                                <span class="badge rounded-pill bg-danger">{{round($discount)}}%</span>

                                @endif
                                {{-- {{$item->discount_price}} --}}
                            </td>
                            <td>
                                    @if ($item->status == 1)
                                    <span class="badge rounded-pill bg-success">Ative</span>
                                    @else
                                    <span class="badge rounded-pill bg-danger">Inative</span>
                                    @endif
                            </td>

                            <td>
                                <a href="{{route('vendor#editProduct',$item->id)}} " class="btn btn-info" title="Edit Data"> <i class="fa fa-pencil"> </i></a>

                                <a href="{{route('vendor#deleteProduct',$item->id)}} " class="btn btn-danger" title="Delete Data" id="delete"><i class="fa fa-trash"></i> </a>

                                <a href="# " class="btn btn-warning" title="Details"> <i class="fa fa-eye"> </i></a>

                                @if ($item->status == 1)
                                <a href="{{route('vendor#productInactive',$item->id)}} " class="btn btn-primary" title="Inactive Data" ><i class="fa fa-thumbs-down"></i> </a>
                                    @else
                                    <a href="{{route('vendor#productActive',$item->id)}}" class="btn btn-primary" title="Active Data" ><i class="fa fa-thumbs-up"></i> </a>

                                    @endif


                            </td>

                        </tr>

                        @endforeach



                    </tbody>
                    <tfoot>

                        <tr>
                            <th>Sl</th>
                            <th> Image</th>
                            <th>Product Name</th>
                            <th> Price</th>
                            <th>QTY</th>
                            <th> Discount</th>
                            <th> Status</th>

                            <th>Action</th>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <h6 class="mb-0 text-uppercase">DataTable Import</h6>
    <hr/>





</div>
@endsection

@extends('main')

@section('content')
<div class="container">
    <div class="row">
            <div class="col-md-8">
                 مرحباً {{ ( Auth::user()->name )}} <strong>في كلية الامارات</strong> قسم : {{Auth::user()->dept->name}}
             </div><!-- End row col-md-8  !-->
             <div class="col-md-8">
               <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-book"></i>تفاصيل النتيجة </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                <tr>
                              @foreach ($xs as $x)
                                 <td colspan="3" class="portlet box blue" style="color:#FFFFFF">{{$x}}</td>
                                    <tr>
                                    <td>اسم المادة</td>
                                    <td>الدرجة</td>
                                    <td>التقدير</td>
                                    </tr>
                                     <tr>
                                     @foreach ($results as $result)  
                                       @if($result->semester->name == $x) 
                                            <td>{{$result->subjects[0]->name}}</td>                 
                                            <td>{{$result->first()->mark}}</td>
                                            <td>{{$result->first()->grad}}</td>
                                            </tr>
                                        @endif
                                     @endforeach
                                 </tr>
                              @endforeach
                               
                            </thead>
                            <tbody> 

                           </tbody>
                        </table>
                                    </div>
                                </div>
                            </div>
             </div><!-- End row col-md-8  !-->
        </div>  <!-- End row  !-->
    </div>
</div>
@endsection

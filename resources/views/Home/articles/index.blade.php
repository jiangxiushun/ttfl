@extends('Home.common.common')
@section('content')
              	<div class="part-right">
                  <p class="part-suggest-title">热销推荐</p>
                  <div class="part-suggest">
                    @foreach($rexiao as $k=>$v)
                          <a href="/home/show/{{$v->id}}" title="{{$v->gname}}">
                          <dl>
                                <dt>
                                 <img class="" src="{{$v->profile1}}"></dt>
                                <dd class="title ell">{{$v->gname}}</dd>
                                <dd class="info ell"></dd>
                                <dd class="price">
                                    ￥{{$v->price}}                               
                                </dd>
                            </dl>
                        </a>
                    @endforeach
                    </div>
             	</div>
              	<div class="articles">
              		<center class="biaoti">{{$data->title}}</center>
              		<p style="padding-left:500px;padding-top:20px;color:#9999A6;">作者:　{{$data->author}}</p><p style="padding-left:500px;padding-top:20px;color:#9999A6;">发表日期:　{{$data->created_at}}</p>
              		<center class='content' style="padding-top:20px">
              			{!!$data->content!!}
              		</center>
              	</div>
	<script type="text/javascript">
        $('.sn_nav').css('display','none');
        $('.sn_nav').parent().parent().mouseover(function(){
        $('.sn_nav').css('display','list-item');
      }).mouseout(function(){
        $('.sn_nav').css('display','none');
      });
    </script>
    <style type="text/css">
    	.part-right{
    		padding-left:70px;
    	}
		.articles{
			width:700px;
			padding-left:70px;
			float:left;
		}

		.biaoti{
			padding-top:70px;
			font-size:38px;
			color:#F97B00;
		}
		.content p{
			font-size:20px;
		}
		.content p span{
			width:20px;
			font-size:20px;
		}
    </style>
@endsection
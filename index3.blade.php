@extends('layouts.default')
@section('content')

<style>
.selectize-dropdown-content
{
	overflow-y: auto;
	max-height: none;
}
</style>

<div class="padding-70">

						{{-- CENTER GRID --}}
	<div class="col-sm-8 center-height-85 box-shadow">
		<div class="well custom-center-well">
			<div class="tab-content">
				<!-- ************************GLOBAL CHAT TAB********************************* -->
	            <div id="global" class="tab-pane fade in active">
	            	<div class="global-window">
	            	   @if(getGlobalMessages()->count() > 0)
	            	    @foreach(getGlobalMessages() as $message)
	            	     @if($message->user->id == $currentUser->id)
	            	     	{{-- MY MESSAGE --}}	
	            	     	<div class="row">
			                  <div class="col-md-1 pull-right chat_img_pos" style="padding:0px;">
			                  <a href="{{ URL::to('/'.$currentUser->username ) }}">  
			                   <img src="{{ checkUserAvatar($currentUser->email,'small') }}" class="chat_img img-responsive"/>
			                      <div class="tooltip">
			                      </div>
			                    </a>
			                  </div>
			                  <div class="col-md-5 pull-right Area">
			                    <div class="col-md-12" style="padding:0px;">
			                      <div class="col-md-8 pull-right text-right chat_username"> Me
			                      </div>
			                      <div class="col-md-2" style="font-size: 8px;">                        
			                      </div>
			                      <div class="col-md-8 col-md-offset-4 pull-right text-right chat_time">  {{$message->created_at->diffForHumans()}}
			                      </div>
			                      <div class="col-md-12 pull-left text-center chat_text chat_text_right">
			                        {{ decryptMessage($message->body) }}
			                      </div>
			                    </div>
			                  </div>
			                </div>
			             			   {{-- USER MESSAGE --}}
			                @else
			                <div class="row">
			                  <div class="col-md-1 pull-left chat_img_pos_left" style="padding:0px;">
			                     <a href="{{ URL::to('/'.$message->user->username ) }}">
			                      <img src="{{ checkUserAvatar($message->user->email,'small') }}" class="chat_img img-responsive"/>
			                      <div class="tooltip">
			                      </div>
			                    </a>
			                  </div>
			                  <div class="col-md-5 pull-left Area-left">
			                    
			                    <div class="col-md-12" style="padding:0px;">
			                      <div class="col-md-8 pull-left text-left chat_username"> {{$message->user->info->firstname}} {{$message->user->info->lastname}} 
			                      </div>
			                      <div class="col-md-2" style="font-size: 8px;">
			                        {{'@'.$message->user->username}}
			                      </div>
			                      <div class="col-md-8 col-md-offset-1 pull-left text-left chat_time">
			                       {{$message->created_at->diffForHumans()}}
			                      </div>
			                      <div class="col-md-12 pull-right text-center chat_text">
			                        {{ decryptMessage($message->body) }}
			                      </div>
			                    </div>
			                  </div>
			                </div>
			                @endif
			                @endforeach
			                   {{-- NO ACTIVITY --}}
			                @else
			                <div class="row">
			                  <div class="global-inactive col-md-12">
			                    <p>Hmmm, Global seems to be inactive at the moment...</p>
			                  </div>
			                </div>
			                @endif
			        </div><!-- /global-window -->
                </div><!-- /global -->
                 <!-- ************************GROUP CHAT TAB********************************* -->
                <div id="groups" class="tab-pane fade">
                  <h3>Group Tab</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil commodi quaerat eius ipsam, error necessitatibus unde deleniti facere repellat, recusandae, nesciunt repellendus pariatur sint accusantium excepturi, magni odit expedita ipsa.</p>
                </div>
                <!-- ************************PRIVATE CHAT TAB********************************* -->
                <div id="friends" class="tab-pane fade">
                  <h3>Friends Tab</h3>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                </div>
			</div><!-- /tab-content -->
		</div><!-- /custom-center-well -->
	</div><!-- /center-height-85 -->
	


					{{-- RIGHT GRID --}}
	<div class="col-sm-4 ">
	  

		<div class="right-fixed right-height-55">
		  
		  



		

		</div>
			
	</div><!-- /col-sm-4 -->


</div><!-- /padding-70 -->








@stop

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('修改活動內容') }}
        </h2>
    </x-slot>
	
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 m-6 text-center">
                     @if($errors->any())
						<div class = "error p-3 bg-red-150 text-white font-thin rounded">
							<ul>
								@foreach($errors -> all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>

					@endif

					<form action = "{{ route('articles.update', $article) }}" method = "post">  
						@csrf
						@method('patch')
						<div class="field my-2 ">
							<lable for="" class="mb-2"> {{__("標題")}}</lable>
							<input type = "text" value="{{ $article -> title }}" name = "title" class = "w-2/5 border-gray-300 p-2 mx-2">

						</div>

						<div class="flex-auto ">
							<div class="field my-2" ><p>{{__("內文")}}</p></div>
							<div class="field my-2" >
								<lable for="" class="mb-2"> {{__("")}} </lable>
								<textarea name = "content" rows = "20" class = "w-4/5 m-auto border-gray-300 p-2 " >{{ $article -> content }}</textarea>

							</div>
						</div>
						
						<div class="flex-auto ">
							<div class="field my-2" ><p>{{__("簡介")}}</p></div>
							<div class="field my-2 " >
								<lable for="" class="mb-2"> {{__("")}} </lable>
								<textarea name = "summary" rows = "5" class = "w-4/5 m-auto border-gray-300 p-2" >{{ $article -> summary }}</textarea>

							</div>
						</div>

						<div class="field my-2 ">
							<lable for=""> {{__("開始時間")}} </lable>
							<input type = "date" value="{{ $article -> start_time }}" name = "start_time" class = "border-gray-300 p-2 mx-2">

						</div>

						<div class="field my-2 ">
							<lable for=""> {{__("結束時間")}} </lable>
							<input type = "date" value="{{ $article -> end_time }}" name = "end_time" class = "border-gray-300 p-2 mx-2">

						</div>

						<div class="flex mt-4 space-x-6 justify-center">
							<div class="actions">
								<button type = "submit" class="px-3 py-1 rounded bg-gray-800 text-white hover:bg-gray-700"> {{__("修改活動內容")}} </button>

							</div>
							<div class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300 ">	
								<a href = "{{route('dashboard')}}" > {{__("取消修改")}} </a>
							</div>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
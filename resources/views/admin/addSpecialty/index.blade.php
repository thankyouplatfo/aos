@extends('layouts.panel')
@section('content')
    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5 class="w3-xxlarge"><b class="w3-right-align"><i class="fa fa-random" aria-hidden="true"></i> إضافة تخصص </b><a
                href="{{  route('admin.addSpecialty.create') }}" class="w3-left"><i class="fa fa-plus"></i></a></h5>
    </header>
    
    <div class="w3-panel w3-rightbar w3-sand w3-xxlarge w3-serif w3-margin">
        @if (session()->has('success'))
            <div class="alert alert-ok w3-xlarge">
                <p><i>"{{  session()->get('success') }}"</i></p>
            </div>
        @endif
    </div>
    <div class="w3-panel">
        <!---->
        <div class="w3-row-padding" style="margin:0 -16px">
            
            <div class="w3-responsive">
                
                <p>
                    <input oninput="w3.filterHTML('#id01', '.item', this.value)" class="w3-input"
                        placeholder="أبحث في جدول المواد بواسطة المعرف || العنوان || الوصف">
                </p>
                <table id="id01" class="w3-table w3-striped w3-white w3-centered w3-bordered">
                    <tr class="w3-bordered w3-border-black">
                        <th>
                            المعرف
                        </th>
                        <th>
                            صورة    
                        </th>
                        <th>
                            اسم    
                        </th>
                        <th>
                            الموقع الالكتروني 
                        </th>
                        <th>
                            الكلية الام
                        </th>
                        <th>
                            حول    
                        </th>
                        <th>
                            معاينة
                        </th>
                        <th>
                            تحرير
                        </th>
                        <th>
                            حذف
                        </th>
                    </tr>
                    @foreach ($addSpecialty as $addSpecialty)
                        <tr class="item">
                            <td>
                                {{ $addSpecialty->id }}
                            </td>
                            <td id="td-bg" style="background-image: url({{ asset('images/addSpecialty/'.$addSpecialty->image) }})">
                                
                            </td>
                            <td>
                                {{ $addSpecialty->name }}
                            </td>
                            <td>
                                <a  target="_bank" href="{{$addSpecialty->website}}">انقر للزيارة</a>
                            </td>
                            <td>
                                {{ $addSpecialty->addCollege->name}}
                            </td>
                            <td>
                                <details>
                                    <summary>انقر للإطلاع</summary>
                                    <p>{{$addSpecialty->about}}.</p>
                                  </details>
                            </td>
                            <td>
                                <a href="{{ route('specialty',$addSpecialty->id) }}"
                                    class=" w3-hover-none w3-button w3-bar-item" target="_blank"><i
                                        class="w3-xlarge fa fa-eye cnsb-hov-txt-green"></i></a>
                            </td>
                            <td>
                                <a href="{{ route('admin.addSpecialty.edit', $addSpecialty) }}"
                                    class=" w3-hover-none w3-button w3-bar-item"><i
                                        class="w3-xlarge fa fa-edit cnsb-hov-txt-blue"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('admin.addSpecialty.destroy', $addSpecialty) }}" method="post">@csrf<button
                                        type="submit" class=" w3-hover-none w3-button w3-bar-item" onclick="alert('سيتم حذف هذا الصف وجميع بياناته من الجدول الموجود فيه قد يترتب على ذلك حذف التوابع المقترنة بهذا الصف')"><i
                                            class="w3-xlarge fa fa-trash cnsb-hov-txt-red"></i></button></form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <hr>
    <!-- Footer -->
    <footer class="w3-container w3-padding-16 w3-light-grey">
        <h4 id="logo">AOS</h4>
        تشكر مجموعة على <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a> اتاحتها هذا القالب
        بشكل مجاني
        <p class="w3-opacity w3-text-black w3-border-top w3-border-bottom w3-border-black ">
            قام بتعديل هذا القالب بما يتلائم وهذا المشروع المبرمج/ <a href="https://www.facebook.com/almashkliabualeiz">معتز
                المشكلي</a> يمكنك الضغط على <a
                href="https://www.w3schools.com/w3css/tryit.asp?filename=tryw3css_templates_analytics&stacked=h">هنا</a>
            لرؤية القالب قبل التعديل
        </p>
    </footer>
@endsection

<!DOCTYPE html>
<html lang="en">
{{-- head  --}} 
<head>
    @include('fontend.index.component.head')
</head>
<body class="container-fluid">
    <div>
        {{-- navbar --}}
        @include('fontend.index.component.navbar')
        {{-- layout  --}}
        @include($template)
    </div>
    {{-- footer  --}}
    @include('fontend.index.component.footer')
</body>
{{-- script  --}}
@include('fontend.index.component.script')

</html>
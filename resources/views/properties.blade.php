@foreach($properties as $value => $name)
• {{ $value }}:{!! "\n" !!}<code> {{ $name }}</code>
@endforeach

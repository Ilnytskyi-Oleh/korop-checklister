<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        @isset($checklistGroup)
            <li class="breadcrumb-item"><a href="{{ route('admin.checklist_groups.show', $checklistGroup) }}">{{ $checklistGroup->name }}</a></li>
        @endisset
        <li class="breadcrumb-item active">{{ isset($checklist) ? $checklist->name : 'New' }}</li>
    </ol>
</div>

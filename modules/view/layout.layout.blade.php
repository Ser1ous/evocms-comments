@extends('layout.layout')
@section('scripts')
    <script>
        webix.ui({
            rows:[
                {view:"label", label:"Loading from DB (NodeJS)"},
                {
                    view:"datatable",
                    columns:[
                        { id:"package",	header:"Name", fillspace:true },
                        { id:"section",	header:"Section", width:180 },
                        { id:"size",	header:"Size", width:100  },
                        { id:"architecture", header:"PC", width:60  }
                    ],
                    url:"/manager/?a=112&id=5ba58db450ed04421f2a369e8eceb253&action=returnAllComments"}
            ]
        });
    </script>
@endsection

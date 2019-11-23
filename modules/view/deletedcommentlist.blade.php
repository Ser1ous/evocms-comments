@extends('layout.layout')
@section('scripts')
    <script>
        webix.ui({
            rows: [
                {
                    cols: [{
                        view: "button", value: "Модерация", href: "/manager/?a=112&id=5ba58db450ed04421f2a369e8eceb253", click: function () {
                            window.location = this.config.href;
                        }
                    },
                        {
                        view: "button", value: "Удалённые", href: "/manager/?a=112&id=5ba58db450ed04421f2a369e8eceb253&action=deletedComment", click: function () {
                            window.location = this.config.href;
                        }
                    },
                    ]
                },
                {
                    view: "datatable",
                    editable:true,
                    columns: [
                        {id: "id", header: "id", width: 20},
                        {id: "name", header: "Имя", width: 180, editor: "text"},
                        {id: "message", header: "Сообщение", fillspace: true, editor: "text"},
                        {
                            id: "published",
                            header: "Опубликовано",
                            width: 100,
                            template: "{common.checkbox()}",
                            editor: "checkbox"
                        },
                        { id:"id",	header:"Восстановить",
                            template:function(obj){
                                return "<div class='webix_el_button'><button class='webixtype_base'>Восстановить</button></div>";
                            }
                        },
                        { id:"id",	header:"Удалить",
                            template:function(obj){
                                return "<div class='webix_el_button'><button class='webixtype_basefull'>Удалить</button></div>";
                            }
                        }
                    ],
                    onClick:{
                        webixtype_base:function(ev, id, html){
                            webix.ajax("/manager/?a=112&id=5ba58db450ed04421f2a369e8eceb253&action=restoreComment&comment_id="+id);
                            this.remove(id);
                        },
                        webixtype_basefull:function(ev, id, html){
                            webix.ajax("/manager/?a=112&id=5ba58db450ed04421f2a369e8eceb253&action=destroyComment&comment_id="+id);
                            this.remove(id);
                        }
                    },
                    url: "/manager/?a=112&id=5ba58db450ed04421f2a369e8eceb253&action=returnDeletedComments",
                    save: "/manager/?a=112&id=5ba58db450ed04421f2a369e8eceb253&action=saveComments"
                }
            ]
        });
    </script>
@endsection

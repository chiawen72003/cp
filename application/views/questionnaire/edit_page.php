<div id="wrapper">
    <div class="questionnaire add">
        <div id="page-header">
            <div class="page-header-left">
                <a  class="btn-back" onclick="history.back();"><i class="material-icons">arrow_back</i></a>
                <div class="page-title">編輯問卷</div>
            </div>
            <div class="page-header-right">
                <a  class="page-header-btn btn-submit" onclick="send()">提交</a>
            </div>
        </div>
        <div id="page-container">
            <!-- page-body -->
            <div id="page-body">
                <div class="add-button-wrap">
                    <ul class="add-button-list">
                        <li>
                            <a data-add-title="新增問題" onclick="add_item()">
                                <i class="material-icons">add_circle</i>
                            </a>
                        </li>
                        <!--
                        <li>
                            <a href="" data-add-title="新增分數">
                                <i class="material-icons">filter_9_plus</i>
                            </a>
                        </li>
                        -->
                        <li>
                            <a data-add-title="新增區塊" onclick="add_block()">
                                <i class="material-icons">view_stream</i>
                            </a>
                        </li>
                    </ul>
                </div>
                <?php
                echo form_open('questionnaire/update_data', array('id' => 'Form1'),array('num' => $num));
                ?>
                <div class="form-wrap" id="block_area">
                    <div class="form-area add-wrap">
                        <div class="form-group">
                            <input type="text" class="form-control questionnaire-h1" placeholder="問卷標題" name="title_dsc" id="title_dsc" value="<?php echo $q_data['title_dsc']; ?>">
                        </div>
                        <div class="form-group">
                            <textarea rows='1' class="form-control" placeholder='問卷說明' name="contents_dsc" id="contents_dsc"><?php echo $q_data['contents_dsc']; ?></textarea>
                        </div>
                    </div>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
            <!-- page-body end -->

            <!-- gotop -->
            <div class="page-gotop">
                <a href="#" class="gotop"><i class="material-icons">vertical_align_top</i></a>
            </div>
            <!-- gotop end -->
        </div>
    </div>
</div>
<div id="html_sample_area" style="display: none;">
    <div class="add-wrap" id="sample_block" >
        <!-- 新增區塊無內容 -->
    </div>
    <div class="add-wrap">
        <!-- 簡答 -->
        <div class="form-area" id="sample_simple_ans">
            <input type="hidden" id="item_area_num" name="item_area_num[]" value="">
            <div class="form-area-drag"><i class="material-icons">drag_handle</i></div>
            <div class="form-group form-group-title">
                <div class="form-inline s9">
                    <input type="text" class="form-control form-title questionnaire-h2" placeholder="未命名簡答問題" id="sample_title" name="item_title[]">
                </div>
                <div class="form-inline s1">
                    <select class="form-control form-title-select s1" id="sample_type" name="item_type[]">
                        <option value="simple_ans" selected>簡答</option>
                        <option value="detailed">段落</option>
                        <option value="radiobox">單選</option>
                        <option value="checkbox">多選</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group-list">
                    <div class="form-group">
                        <div class="form-group-list-li">
                            <input type="text" class="form-control" placeholder="簡答文字" disabled />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 簡答 end -->

        <!-- 段落 -->
        <div class="form-area" id="sample_detailed_ans">
            <input type="hidden" id="item_area_num" name="item_area_num[]" value="">
            <div class="form-area-drag"><i class="material-icons">drag_handle</i></div>
            <div class="form-group form-group-title">
                <div class="form-inline s9">
                    <input type="text" class="form-control form-title questionnaire-h2" placeholder="未命名段落問題" id="sample_title" name="item_title[]">
                </div>
                <div class="form-inline s1">
                    <select class="form-control form-title-select s1" id="sample_type" name="item_type[]">
                        <option value="simple_ans" >簡答</option>
                        <option value="detailed" selected>段落</option>
                        <option value="radiobox">單選</option>
                        <option value="checkbox">多選</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group-list">
                    <div class="form-group">
                        <div class="form-group-list-li">
                            <input type="text" class="form-control" placeholder="詳答文字" disabled />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 段落 end -->
    </div>
    <div class="add-wrap">
        <!-- 單選 -->
        <div class="form-area" id="sample_radiobox">
            <input type="hidden" id="item_area_num" name="item_area_num[]" value="">
            <div class="form-area-drag"><i class="material-icons">drag_handle</i></div>
            <div class="form-group form-group-title">
                <div class="form-inline s9">
                    <input type="text" class="form-control form-title questionnaire-h2" placeholder="未命名單選問題" id="sample_title" name="item_title[]">
                </div>
                <div class="form-inline s1">
                    <select class="form-control form-title-select s1" id="sample_type" name="item_type[]">
                        <option value="simple_ans" >簡答</option>
                        <option value="detailed" >段落</option>
                        <option value="radiobox" selected>單選</option>
                        <option value="checkbox">多選</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group-list">

                    <div class="form-group-list-li" id="sample_add_area">
                        <div class="form-group-list-li__click">
                            <input type="radio" class="form-radio" name="iCheck" disabled>
                        </div>
                        <div class="form-group-list-li__input">
                            <a id="add_itme" onclick="" class="form-group-list-li_name">新增選項</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- 單選 radio 物件 -->
            <div class="form-group-list-li" id="sample_radiobox_item">
                <div class="form-group-list-li__click">
                    <input type="radio" class="form-radio" name="iCheck" disabled>
                </div>
                <div class="form-group-list-li__input">
                    <input type="text" class="form-control" placeholder="選項名稱" required id="sample_radiobox_value" />
                </div>
                <div class="form-group-list-li__del">
                    <a id="del_item"><i class="material-icons">close</i></a>
                </div>
            </div>
            <!-- 單選 radio 物件 end -->
        <!-- 單選 end -->
        <!-- 多選 -->
        <div class="form-area" id="sample_checkbox">
            <input type="hidden" id="item_area_num" name="item_area_num[]" value="">
            <div class="form-area-drag"><i class="material-icons">drag_handle</i></div>
            <div class="form-group form-group-title">
                <div class="form-inline s9">
                    <input type="text" class="form-control form-title questionnaire-h2" placeholder="未命名多選問題" id="sample_title" name="item_title[]">
                </div>
                <div class="form-inline s1">
                    <select class="form-control form-title-select s1" id="sample_type" name="item_type[]">
                        <option value="simple_ans" >簡答</option>
                        <option value="detailed" >段落</option>
                        <option value="radiobox" >單選</option>
                        <option value="checkbox" selected>多選</option>
                    </select>
                </div>
            </div>
            <div class="form-gro form-titleup">
                <div class="form-group-list">
                    <div class="form-group-list-li" id="sample_add_area">
                        <div class="form-group-list-li__click">
                            <input type="checkbox" class="form-checkbox" name="iCheck" disabled>
                        </div>
                        <div class="form-group-list-li__input">
                            <a id="add_itme" onclick="" class="form-group-list-li_name">新增選項</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- 多選 checkbox 物件 -->
        <div class="form-group-list-li" id="sample_checkbox_item">
                <div class="form-group-list-li__click">
                    <input type="checkbox" class="form-checkbox" name="iCheck" disabled>
                </div>
                <div class="form-group-list-li__input">
                    <input type="text" class="form-control" placeholder="選項名稱" required id="sample_checkbox_value" />
                </div>
                <div class="form-group-list-li__del">
                    <a id="del_item"><i class="material-icons">close</i></a>
                </div>
            </div>
            <!-- 多選 checkbox 物件 end -->
        <!-- 多選 end -->
    </div>
    <div class="add-wrap">
        <!-- 新增區塊無內容 -->
    </div>

</div>
<!-- questionnaireList -->
<script src="<?php echo $base;?>public/js/back/icheck.js"></script>
<script src="<?php echo $base;?>public/js/back/main.js?v=0.1"></script>
<!-- questionnaireList end -->
<script>
    var old_item_data = '<?php echo $q_data['item_data'];?>';
    $(document).ready(function(){
        set_item();
    });

    /**
     * 初始化問卷物件
    */
     function set_item() {
        if(old_item_data != '')
        {
            var items = JSON.parse ( old_item_data );
            var total_item = items.length;
            for(var x=0; x<total_item; x++)
            {
                //新增物件並設定標題及類別
                add_item();
                $('#item_title_' + x).val(items[x]['title']);
                $('#item_type_' + x).val(items[x]['type']);
                change_type(x);
                if(items[x]['type'] == 'checkbox')
                {
                    var sub_item_num =  items[x]['items'].length;
                    //如果有物件，先清掉系統預設給的物件，否則會多一組資料出來
                    if(sub_item_num > 0)
                    {
                        var t_obj = $('#item_num_'+x).find('.form-group-list-li').first().remove();
                    }

                    for(var y=0; y<sub_item_num; y++)
                    {
                        add_checkbox_item(x, items[x]['items'][y]);
                    }
                }
                if(items[x]['type'] == 'radiobox')
                {
                    var sub_item_num =  items[x]['items'].length;
                    //如果有物件，先清掉系統預設給的物件，否則會多一組資料出來
                    if(sub_item_num > 0)
                    {
                        var t_obj = $('#item_num_'+x).find('.form-group-list-li').first().remove();
                    }

                    for(var y=0; y<sub_item_num; y++)
                    {
                        add_radiobox_item(x, items[x]['items'][y]);
                    }
                }
            }
        }
    }


    /**
     * 送出資料
     */
    var isSend = false;
    function send() {
        if(!isSend){
            $('#Form1').submit();
            isSend = true;
        }
    }


    /**
     * 新增區塊
     */
    function add_block()
    {
        var t_obj = $('#sample_block').clone();
        t_obj.attr('id','');
        $('#block_area').append(t_obj);
    }

    /**
     * 新增問題
     */
    var item_num = 0;
    function add_item()
    {
        var t_obj = $('#sample_simple_ans').clone();
        t_obj.attr('id','item_num_'+ item_num);
        t_obj.find('#sample_type').attr('id', 'item_type_' + item_num).attr('onchange','change_type("' + item_num +'")');
        t_obj.find('#sample_title').attr('id', 'item_title_' + item_num);
        t_obj.find('#item_area_num').attr('id', '').val(item_num);
        $('#block_area').append(t_obj);
        item_num++;
    }

    /**
     * 更換問卷物件
     */
    function change_type(get_num) {
        var item_type = $('#item_type_' + get_num).val();
        var item_title = $('#item_title_' + get_num).val();
        //簡答
        if(item_type == 'simple_ans')
        {
            var t_obj = $('#sample_simple_ans').clone();
            t_obj.find('#item_area_num').attr('id', '').val(get_num);
            t_obj.attr('id','item_num_'+ get_num);
            t_obj.find('#sample_type').attr('id', 'item_type_' + get_num).attr('onchange','change_type("' + get_num +'")');
            t_obj.find('#sample_title').attr('id', 'item_title_' + get_num).val(item_title);
            $('#item_num_'+ get_num).attr('id','old_item_obj');
            $('#old_item_obj').before(t_obj).remove();
        }
        //段落
        if(item_type == 'detailed')
        {
            var t_obj = $('#sample_detailed_ans').clone();
            t_obj.find('#item_area_num').attr('id', '').val(get_num);
            t_obj.attr('id','item_num_'+ get_num);
            t_obj.find('#sample_type').attr('id', 'item_type_' + get_num).attr('onchange','change_type("' + get_num +'")');
            t_obj.find('#sample_title').attr('id', 'item_title_' + get_num).val(item_title);
            $('#item_num_'+ get_num).attr('id','old_item_obj');
            $('#old_item_obj').before(t_obj).remove();
        }
        //單選
        if(item_type == 'checkbox')
        {
            var t_obj = $('#sample_checkbox').clone();
            t_obj.find('#item_area_num').attr('id', '').val(get_num);
            t_obj.attr('id','item_num_'+ get_num);
            t_obj.find('#sample_type').attr('id', 'item_type_' + get_num).attr('onchange','change_type("' + get_num +'")');
            t_obj.find('#sample_title').attr('id', 'item_title_' + get_num).val(item_title);
            t_obj.find('#sample_add_area').attr('id', 'checkbox_add_' + get_num);
            t_obj.find('#add_itme').attr('id', '').attr('onclick', 'add_checkbox_item("'+ get_num +'")');
            $('#item_num_'+ get_num).attr('id','old_item_obj');
            $('#old_item_obj').before(t_obj).remove();
            add_checkbox_item(get_num);
        }
        //多選
        if(item_type == 'radiobox')
        {
            var t_obj = $('#sample_radiobox').clone();
            t_obj.find('#item_area_num').attr('id', '').val(get_num);
            t_obj.attr('id','item_num_'+ get_num);
            t_obj.find('#sample_type').attr('id', 'item_type_' + get_num).attr('onchange','change_type("' + get_num +'")');
            t_obj.find('#sample_title').attr('id', 'item_title_' + get_num).val(item_title);
            t_obj.find('#sample_add_area').attr('id', 'radiobox_add_' + get_num);
            t_obj.find('#add_itme').attr('id', '').attr('onclick', 'add_radiobox_item("'+ get_num +'")');
            $('#item_num_'+ get_num).attr('id','old_item_obj');
            $('#old_item_obj').before(t_obj).remove();
            add_radiobox_item(get_num);
        }
    }

    /**
     * 增加一個checkbox物件
     */
    var checkbox_item_num = 0;
    function add_checkbox_item(get_num, get_val = '') {
        var checkbox_item = $('#sample_checkbox_item').clone();
        checkbox_item.find('#sample_checkbox_value').attr('name', 'checkbox_value_' + get_num + '[]').attr('id', '').val(get_val);
        checkbox_item.find('#del_item').attr('onclick', '$("#checkbox_item_'+ checkbox_item_num +'").remove()').attr('id', '');
        checkbox_item.attr('id', 'checkbox_item_' + checkbox_item_num);
        $('#checkbox_add_' + get_num).before(checkbox_item);
        checkbox_item_num++;
    }

    /**
     * 增加一個radiobox物件
     */
    var radiobox_item_num = 0;
    function add_radiobox_item(get_num, get_val = '') {
        var radiobox_item = $('#sample_radiobox_item').clone();
        radiobox_item.find('#sample_radiobox_value').attr('name', 'radiobox_value_' + get_num + '[]').attr('id', '').val(get_val);
        radiobox_item.find('#del_item').attr('onclick', '$("#radiobox_item_'+ radiobox_item_num +'").remove()').attr('id', '');
        radiobox_item.attr('id', 'radiobox_item_' + radiobox_item_num);
        $('#radiobox_add_' + get_num).before(radiobox_item);
        radiobox_item_num++;
    }

</script>
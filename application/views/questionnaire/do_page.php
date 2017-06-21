
<div id="mainBody">
    <div id="page-header">
        <div class="page-title"><?php echo $q_data['title_dsc']; ?></div>
    </div>
    <div id="page-container">
        <!-- page-body -->
        <div id="page-body">
            <div class="form-wrap">
                <div class="add-wrap questionnaire-title">
                    <div class="form-group">
                        <div class="questionnaire-h1"><?php echo $q_data['title_dsc']; ?></div>
                    </div>
                    <div class="form-group">
                        <div class="questionnaire-con">
                            <?php echo $q_data['contents_dsc']; ?>
                        </div>
                    </div>
                </div>
                <hr>
                <?php
                echo form_open('questionnaire/insert_data', array('id' => 'Form1'), array('num' => $num));
                ?>

                <div class="add-wrap" id="item_insert_area">

                </div>
                <?php
                echo form_close();
                ?>

                <div class="questionnaire-button">
                    <button class="btn btn-submit" onclick="send()">提交</button>
                </div>
            </div>
        </div>
        <!-- page-body end -->

        <!-- gotop -->
        <div class="page-gotop">
            <a href="#" class="gotop"><i class="material-icons">vertical_align_top</i></a>
        </div>
        <!-- gotop end -->
    </div>
    <div id="page-footer">
        <div class="copyright">
            Copyright © National Taichung University of Education
        </div>
    </div>
</div>
<div id="html_sample_area" style="display: none;">
    <!-- 簡答 -->
    <div class="form-area" id="sample_simple_ans">
        <div class="form-area-drag"><i class="material-icons">drag_handle</i></div>
        <div class="form-group form-group-title">
            <div class="title" id="sample_title">
            </div>
        </div>
        <div class="form-group">
            <div class="form-group-list">
                <!-- 編輯狀態 -->
                <div class="form-group">
                    <div class="form-group-list-li">
                        <input type="text" class="form-control" placeholder="簡答文字" id="sample_input" />
                    </div>
                </div>
                <!-- 編輯狀態 end -->
            </div>
        </div>
    </div>
    <!-- 簡答 end -->
    <!-- 段落 -->
    <div class="form-area" id="sample_detailed_ans">
        <div class="form-area-drag"><i class="material-icons">drag_handle</i></div>
        <div class="form-group form-group-title">
            <div class="title" id="sample_title">
            </div>
        </div>
        <div class="form-group">
            <div class="form-group-list">
                <!-- 編輯狀態 -->
                <div class="form-group">
                    <div class="form-group-list-li">
                        <textarea rows='1' class="form-control" placeholder='詳答文字' id="sample_input"></textarea>
                    </div>
                </div>
                <!-- 編輯狀態 end -->
            </div>
        </div>
    </div>
    <!-- 段落 end -->
    <!-- 單選 -->
    <div class="form-area" id="sample_radio">
        <div class="form-area-drag"><i class="material-icons">drag_handle</i></div>
        <div class="form-group form-group-title">
            <div class="title" id="sample_title">
            </div>
        </div>
        <div class="form-group">
            <div class="form-group-list" id="radio_input_area">
            </div>
        </div>
    </div>
    <!-- 單選 物件 -->
        <div class="form-group-list-li" id="sample_radio_item">
            <div class="form-group-list-li__click">
                <input type="radio" class="form-radio" name="" id="radio_input">
            </div>
            <div class="form-group-list-li__input">
                <div class="form-group-list-li_name" id="radio_dsc"></div>
            </div>
        </div>
    <!-- 單選 物件 end -->

    <!-- 單選 end -->
    <!-- 多選 -->
    <div class="form-area" id="sample_checkbox">
        <div class="form-area-drag"><i class="material-icons">drag_handle</i></div>
        <div class="form-group form-group-title">
            <div class="title" id="sample_title">
            </div>
        </div>
        <div class="form-gro form-titleup">
            <div class="form-group-list" id="checkbox_input_area">
            </div>
        </div>
    </div>
        <!-- 多選 物件 -->
            <div class="form-group-list-li" id="sample_checkbox_item">
                <div class="form-group-list-li__click">
                    <input type="checkbox" class="form-checkbox" name="" id="checkbox_input">
                </div>
                <div class="form-group-list-li__input">
                    <div class="form-group-list-li_name" id="checkbox_dsc"></div>
                </div>
            </div>
        <!-- 多選 物件 end -->
    <!-- 多選 end -->

    <!-- 分數 -->
    <div class="form-area" id="sample_number">
        <div class="form-area-drag"><i class="material-icons">drag_handle</i></div>
        <div class="form-group form-group-title">
            <div class="title" id="sample_title">
            </div>
        </div>
        <div class="form-group">
            <div class="form-group-list" id="number_input_area">
            </div>
        </div>
    </div>
    <!-- 分數 物件 -->
    <div class="form-group-list-li" id="sample_number_item">
        <div class="form-group-list-li__click">
            <input type="radio" class="form-radio" name="" id="number_input">
        </div>
        <div class="form-group-list-li__input">
            <div class="form-group-list-li_name" id="number_dsc"></div>
        </div>
    </div>
    <!-- 分數 物件 end -->

    <!-- 分數 end -->
</div>
<script src="<?php echo base_url('public/js/questionnaire/jquery.js'); ?>"> </script>
<script src="<?php echo base_url('public/js/icheck.js'); ?>"> </script>
<script src="<?php echo base_url('public/js/main.js'); ?>"> </script>
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
                add_item(items[x]['type'], items[x]['title']);
                if(items[x]['type'] == 'checkbox')
                {
                    var sub_item_num =  items[x]['items'].length;
                    for(var y=0; y<sub_item_num; y++)
                    {
                        add_checkbox_item(x, items[x]['items'][y]);
                    }
                }
                if(items[x]['type'] == 'radiobox')
                {
                    var sub_item_num =  items[x]['items'].length;
                    for(var y=0; y<sub_item_num; y++)
                    {
                       add_radio_item(x, items[x]['items'][y]);
                    }
                }
                if(items[x]['type'] == 'number')
                {
                    var sub_item_num =  items[x]['items'].length;
                    for(var y=0; y<items[x]['items'][0].length; y++)
                    {
                        add_number_item(x, items[x]['items'][0][y], items[x]['items'][1][y]);
                    }
                }
            }
        }
    }

    /**
     * 新增問題
     */
    var item_num = 0;
    function add_item(item_type, item_title)
    {
        //簡答
        if(item_type == 'simple_ans')
        {
            var t_obj = $('#sample_simple_ans').clone();
            t_obj.find('#sample_title').attr('id', '').append(item_title);
            t_obj.find('#sample_input').attr('id', '').attr('name', 'item_'+item_num);
            $('#item_insert_area').append(t_obj);
        }
        //段落
        if(item_type == 'detailed')
        {
            var t_obj = $('#sample_detailed_ans').clone();
            t_obj.find('#sample_title').attr('id', '').append(item_title);
            t_obj.find('#sample_input').attr('id', '').attr('name', 'item_'+item_num);
            $('#item_insert_area').append(t_obj);
        }
         //單選
        if(item_type == 'radiobox')
        {
            var t_obj = $('#sample_radio').clone();
            t_obj.find('#sample_title').attr('id', '').append(item_title);
            t_obj.find('#sample_input').attr('id', '').attr('name', 'item_'+item_num);
            t_obj.find('#radio_input_area').attr('id', 'radio_input_area_'+item_num);

            $('#item_insert_area').append(t_obj);
        }

        //多選
        if(item_type == 'checkbox')
        {
            var t_obj = $('#sample_checkbox').clone();
            t_obj.find('#sample_title').attr('id', '').append(item_title);
            t_obj.find('#sample_input').attr('id', '').attr('name', 'item_'+item_num);
            t_obj.find('#checkbox_input_area').attr('id', 'checkbox_input_area_'+item_num);

            $('#item_insert_area').append(t_obj);
        }

        //分數
        if(item_type == 'number')
        {
            var t_obj = $('#sample_number').clone();
            t_obj.find('#sample_title').attr('id', '').append(item_title);
            t_obj.find('#sample_input').attr('id', '').attr('name', 'item_'+item_num);
            t_obj.find('#number_input_area').attr('id', 'number_input_area_'+item_num);

            $('#item_insert_area').append(t_obj);
        }

        item_num++;
    }

    /**
     * 更換問卷物件
     */
    function change_type(item_num) {
       
    }

    /**
     * 增加一個checkbox物件
     */
    function add_checkbox_item(item_num, get_val = '') {
        var checkbox_item = $('#sample_checkbox_item').clone();
        checkbox_item.find('#checkbox_input').attr('name', 'item_' + item_num + '[]').attr('id', '').val(get_val);
        checkbox_item.find('#checkbox_dsc').append(get_val);
        checkbox_item.attr('id', '');
        $('#checkbox_input_area_' + item_num).append(checkbox_item);
    }

    /**
     * 增加一個radiobox物件
     */
    function add_radio_item(item_num, get_val = '') {
        var radio_item = $('#sample_radio_item').clone();
        radio_item.find('#radio_input').attr('name', 'item_' + item_num ).attr('id', '').val(get_val);
        radio_item.find('#radio_dsc').append(get_val);
        radio_item.attr('id', '');
        $('#radio_input_area_' + item_num).append(radio_item);
    }

    /**
     * 增加一個number物件
     */
    function add_number_item(item_num, get_title = '', get_val = '') {
        var number_item = $('#sample_number_item').clone();
        number_item.find('#number_input').attr('name', 'item_' + item_num ).attr('id', '').val(get_val);
        number_item.find('#number_dsc').append(get_title);
        number_item.attr('id', '');
        $('#number_input_area_' + item_num).append(number_item);
    }


    /**
     * 送出問卷資料
     */
    var isSend = false;
    function send() {
        if(!isSend){
            alert('感謝您填寫問卷!!');
            $('#Form1').submit();
        }
    }
</script>
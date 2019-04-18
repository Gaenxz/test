<?php

namespace Magenest\Movie\Block\Adminhtml;

class ShowMovie extends
    \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'Magenest_Movie';
        $this->_controller = 'adminhtml_ShowActor';
        parent::_construct();
        $this->buttonList->update('add','label',__('New Movie'));
        $this->buttonList->update('add','onclick',
            'setLocation(\'' . $this->getUrl('movie/insertmovie') . '\')');
//        $this->buttonList->add('add_newmovie',[
//            'label'=>__('New Movie'),
//            'class'=>__('new-movie')
//        ]);
    }
}
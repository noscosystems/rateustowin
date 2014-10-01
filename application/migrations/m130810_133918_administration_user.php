<?php

    class m130810_133918_administration_user extends CDbMigration
    {

        /**
         * Migrate Up
         *
         * @access public
         * @return void
         */
        public function up()
        {
            // Create a user.
            $this->insert('{{users}}', array(
                'username'  => 'admin',
                'email'     => 'admin@system62.com',
                'password'  => CPasswordHelper::hashPassword('admin'),
                'branch'    => 1,
                'firstname' => 'System',
                'nickname'  => 'Sysadmin',
                'lastname'  => 'Administrator',
                'created'   => time(),
            ));
        }

        /**
         * Migrate Down
         *
         * @access public
         * @return void
         */
        public function down()
        {
            $this->delete(
                '{{users}}',
                array('AND',
                    implode('=', array(
                        Yii::app()->db->quoteColumnName('username'),
                        Yii::app()->db->quoteValue('admin'),
                    )),
                )
            );
        }

    }

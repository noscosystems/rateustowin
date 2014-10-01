<?php

    class m131204_175141_team_users extends CDbMigration
    {

        /**
         * Migrate: Up
         *
         * @access public
         * @return void
         */
        public function up()
        {
            $this->insert('{{users}}', array(
                'username'  => 'mynameiszanders',
                'email'     => 'mynameiszanders@gmail.com',
                'password'  => CPasswordHelper::hashPassword('password'),
                'branch'    => 1,
                'firstname' => 'Alexander',
                'nickname'  => 'Zander',
                'lastname'  => 'Baldwin',
                'created'   => time(),
            ));
            $this->insert('{{users}}', array(
                'username'  => 'scowen',
                'email'     => 'lmscowen@gmail.com',
                'password'  => CPasswordHelper::hashPassword('password'),
                'branch'    => 1,
                'firstname' => 'Luke',
                'nickname'  => null,
                'lastname'  => 'Scowen',
                'created'   => time(),
            ));
            $this->insert('{{users}}', array(
                'username'  => 'clive',
                'email'     => 'clive.dann@googlemail.com',
                'password'  => CPasswordHelper::hashPassword('password'),
                'branch'    => 1,
                'firstname' => 'Clive',
                'nickname'  => null,
                'lastname'  => 'Dann',
                'created'   => time(),
            ));
            $this->insert('{{users}}', array(
                'username'  => 'pavelpravchev',
                'email'     => 'pavel.pravchev@gmail.com',
                'password'  => CPasswordHelper::hashPassword('password'),
                'branch'    => 1,
                'firstname' => 'Pavel',
                'nickname'  => 'Pav',
                'lastname'  => 'Pravchev',
                'created'   => time(),
            ));
            $this->insert('{{users}}', array(
                'username'  => 'mal',
                'email'     => 'mal.elwood@gmail.com',
                'password'  => CPasswordHelper::hashPassword('password'),
                'branch'    => 1,
                'firstname' => 'Malcolm',
                'nickname'  => 'Mal',
                'lastname'  => 'Elwood',
                'created'   => time(),
            ));
        }

        /**
         * Migrate: Down
         *
         * @access public
         * @return void
         */
        public function down()
        {
            $this->delete(
                '{{users}}',
                array('OR',
                    implode('=', array(
                        Yii::app()->db->quoteColumnName('username'),
                        Yii::app()->db->quoteValue('mynameiszanders'),
                    )),
                    implode('=', array(
                        Yii::app()->db->quoteColumnName('username'),
                        Yii::app()->db->quoteValue('scowen'),
                    )),
                    implode('=', array(
                        Yii::app()->db->quoteColumnName('username'),
                        Yii::app()->db->quoteValue('clive'),
                    )),
                    implode('=', array(
                        Yii::app()->db->quoteColumnName('username'),
                        Yii::app()->db->quoteValue('pavelpravchev'),
                    )),
                    implode('=', array(
                        Yii::app()->db->quoteColumnName('username'),
                        Yii::app()->db->quoteValue('mal'),
                    )),
                )
            );
        }

    }

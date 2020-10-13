<?php
namespace metastore;

/**
 * Autogenerated by Thrift Compiler (0.13.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class SetPartitionsStatsRequest
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'colStats',
            'isRequired' => true,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\metastore\ColumnStatistics',
                ),
        ),
        2 => array(
            'var' => 'needMerge',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
        3 => array(
            'var' => 'writeId',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        4 => array(
            'var' => 'validWriteIdList',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        5 => array(
            'var' => 'engine',
            'isRequired' => true,
            'type' => TType::STRING,
        ),
    );

    /**
     * @var \metastore\ColumnStatistics[]
     */
    public $colStats = null;
    /**
     * @var bool
     */
    public $needMerge = null;
    /**
     * @var int
     */
    public $writeId = -1;
    /**
     * @var string
     */
    public $validWriteIdList = null;
    /**
     * @var string
     */
    public $engine = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['colStats'])) {
                $this->colStats = $vals['colStats'];
            }
            if (isset($vals['needMerge'])) {
                $this->needMerge = $vals['needMerge'];
            }
            if (isset($vals['writeId'])) {
                $this->writeId = $vals['writeId'];
            }
            if (isset($vals['validWriteIdList'])) {
                $this->validWriteIdList = $vals['validWriteIdList'];
            }
            if (isset($vals['engine'])) {
                $this->engine = $vals['engine'];
            }
        }
    }

    public function getName()
    {
        return 'SetPartitionsStatsRequest';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::LST) {
                        $this->colStats = array();
                        $_size322 = 0;
                        $_etype325 = 0;
                        $xfer += $input->readListBegin($_etype325, $_size322);
                        for ($_i326 = 0; $_i326 < $_size322; ++$_i326) {
                            $elem327 = null;
                            $elem327 = new \metastore\ColumnStatistics();
                            $xfer += $elem327->read($input);
                            $this->colStats []= $elem327;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->needMerge);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->writeId);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->validWriteIdList);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->engine);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('SetPartitionsStatsRequest');
        if ($this->colStats !== null) {
            if (!is_array($this->colStats)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('colStats', TType::LST, 1);
            $output->writeListBegin(TType::STRUCT, count($this->colStats));
            foreach ($this->colStats as $iter328) {
                $xfer += $iter328->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->needMerge !== null) {
            $xfer += $output->writeFieldBegin('needMerge', TType::BOOL, 2);
            $xfer += $output->writeBool($this->needMerge);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->writeId !== null) {
            $xfer += $output->writeFieldBegin('writeId', TType::I64, 3);
            $xfer += $output->writeI64($this->writeId);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->validWriteIdList !== null) {
            $xfer += $output->writeFieldBegin('validWriteIdList', TType::STRING, 4);
            $xfer += $output->writeString($this->validWriteIdList);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->engine !== null) {
            $xfer += $output->writeFieldBegin('engine', TType::STRING, 5);
            $xfer += $output->writeString($this->engine);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}

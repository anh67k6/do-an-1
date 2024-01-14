<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bss\Internship\Model;

use Bss\Internship\Api\Data\InternshipInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Internship Model
 */
class Internship extends AbstractModel implements InternshipInterface
{
    /**
     * @var string
     */
    protected $_idFieldName = 'internship_id';
    /**
     * @var string
     */
    protected $_eventPrefix = 'Bss_Internship_internship';
    /**
     * ...
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Bss\Internship\Model\ResourceModel\Internship::class);
    }
    /**
     * ...
     *
     * @return array|mixed|null
     */
    public function getFullName()
    {
        return $this->getData('full_name');
    }

    /**
     * ...
     *
     * @param string $fullName
     * @return Internship
     */
    public function setFullName($fullName)
    {
        return $this->setData('full_name', $fullName);
    }
    /**
     * ...
     *
     * @return array|mixed|null
     */
    public function getDob()
    {
        return $this->getData('date_of_birht');
    }
    /**
     * ...
     *
     * @param date $dob
     * @return Internship
     */
    public function setDob($dob)
    {
        return $this->setData('date_of_birth', $dob);
    }
    /**
     * ...
     *
     * @return array|mixed|null
     */
    public function getGender()
    {
        return $this->getData('gender');
    }
    /**
     * ...
     *
     * @param string $gender
     * @return Internship
     */
    public function setGender($gender)
    {
        return $this->setData('gender', $gender);
    }
    /**
     * ...
     *
     * @return array|mixed|null
     */
    public function getAddress()
    {
        return $this->getData('address');
    }
    /**
     * ...
     *
     * @param string $address
     * @return Internship
     */
    public function setAddress($address)
    {
        return $this->setData('address', $address);
    }
    /**
     * ...
     *
     * @return array|mixed|null
     */
    public function getEmail()
    {
        return $this->getData('email');
    }
    /**
     * ...
     *
     * @param string $email
     * @return Internship
     */
    public function setEmail($email)
    {
        return $this->setData('email', $email);
    }
}

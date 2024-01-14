<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bss\Internship\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface InternshipInterface extends ExtensibleDataInterface
{
    public const NAME = 'full_name';
    public const BIRTHDAY = 'date_of_birth';
    public const GENDER = 'gender';
    public const ADDRESS = 'address';
    public const EMAIL = 'email';

    /**
     * Get name
     *
     * @return mixed
     */
    public function getFullName();

    /**
     * Set full_name
     *
     * @param string $name
     * @return string
     */
    public function setFullName($name);

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender();

    /**
     * Set gender
     *
     * @param string $gender
     * @return string
     */
    public function setGender($gender);

    /**
     * Get dob
     *
     * @return string
     */
    public function getDob();

    /**
     * Set dob
     *
     * @param string $birthday
     * @return string
     */
    public function setDob($birthday);

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set email
     *
     * @param string $email
     * @return string
     */
    public function setEmail($email);

    /**
     * Get string address
     *
     * @return string
     */
    public function getAddress();

    /**
     * Set address
     *
     * @param string $address
     * @return string
     */
    public function setAddress($address);
}

######################
Automatic ISO CD image
######################

You can download one of the `IvozProvider Automatic ISO CD images
<https://github.com/irontec/ivozprovider>`_ (generated using
`simplecdd <https://wiki.debian.org/Simple-CDD>`_) in stable or nightly versions:


.. important:: IMPORTANT: Automatic install CDs will format target machine disk!

* Configure the target machine to boot from CD. It will display the Debian
  GNU/Linux installation menu.

.. note:: You can use graphic installation if you prefer, but the following
   screenshots show the standard installation.

.. image:: img/installcd-intro.png

* Choose installation language:

.. image:: img/installcd-language.png

* Choose location:

.. image:: img/installcd-location.png

* Set root password

.. image:: img/installcd-rootpass.png

* Choose date and time configuration:

.. image:: img/installcd-clock.png

.. note:: At this point, a generic network configuration and disk partitioning
   will be performed, and also a installation of base system.

* Setup MySQL Server root password

.. image:: img/installcd-mysqlpass.png

.. important:: MySQL password must be set in this screen and again in the following
      Ivozprovider configuration menu. If you leave this field empty, the default password
      will be used (see below).

* Configure IvozProvider:

.. image:: img/installcd-ivozmenu.png

As mentioned in :ref:`Minimum requirements` is required at least one public IP
address for User and Trunk SIP proxies. Remember that if you use only one,
KamTrunks will use different SIP ports to avoid collision.

You can set its addresses right now and configure the interfaces properly when
the system is fully installed. This menu can be displayed anytime after the
installation.

.. image:: img/installcd-proxyaddr.png

You can also configure default root MySQL password right now.

.. note:: If you don't configure MySQL password, default password will be used
   (changeme). You can still change it later.

.. image:: img/installcd-mysql.png

And default language for portals:

.. image:: img/installcd-portallang.png

.. note:: It is not require to configure all settings during initial
   installation. In case any setting has been left without configuration a
   warning dialog will be displayed.

.. image:: img/installcd-warning.png

At last, select where the GRUB boot loader will be installed.

.. image:: img/installcd-grub.png

After the reboot, you are ready to access using the web portals!

.. important:: Any of the public IP addresses configured during the
   installation will work to access the web portal. Default credentials are
   **admin / changeme**.


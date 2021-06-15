####################
Minimum requirements
####################

*******************
System requirements
*******************
IvozProvider is designed to be installed using Debian GNU/Linux APT package
system.

.. important:: It's recommended to install IvozProvider in a dedicated server
   for the platform. Many of the installed software may not work properly with
   other pre-installed services (like MySQL or DNS servers).

For a StandAlone installation, we recommend at least:

    * 4 CPUs (x86_64 or i386)
    * 4 Gb memory
    * 30GB HDD
    * 1/2 public IP Addresses (read note behind)

.. note:: It is possible to make both KamUsers and KamTrunks
          share a unique public IP address. If so, **KamTrunks ports will be changed
          from 5060 (TCP/UDP) to 7060 (TCP/UDP) and from 5061 (TCP) to 7061 (TCP)**.


If you're not using a :ref:`Automatic ISO CD image` you will also need:

    * Debian Stretch 9.0 base install
    * Internet access


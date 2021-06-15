#####################
Analyzing SIP traffic
#####################

Although all production IvozProvider installations mantained by
`Irontec <https://www.irontec.com>`_ include a `Homer SIP Capture Server
<https://www.sipcapture.org/>`_, it is not installed in the standlone version
of IvozProvider. The reason behind this is that we prefer awesome SIPCAPTURE
stack running on an additional machine.

`sngrep Ncurses SIP Messages flow viewer developed by Irontec
<https://github.com/irontec/sngrep>`_ is currently
the preferred tool to inspect SIP traffic included in IvozProvider.

.. image:: img/sngrep_sample.png

sngrep
======

See live SIP traffic (all):

.. code-block:: console

    sngrep

See live SIP traffic related to calls:

.. code-block:: console

    sngrep -c

See live SIP traffic and capture RTP too:

.. code-block:: console

    sngrep -c -r

For more reference, visit `sngrep official site <https://github.com/irontec/sngrep>`_.

Other capturing tools
=====================

Although sngrep is our preferred capturing tool, IvozProvider ships other tools 
to capture SIP/RTP traffic, such as `tcpdump <http://www.tcpdump.org>`_ and
`ngrep <http://ngrep.sourceforge.net>`_.


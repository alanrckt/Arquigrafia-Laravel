
-- Album
insert into gw_collab_Album values (1, '2014-01-10', 'aá', 'aaaaa','aaaaa', 1, 1);
insert into gw_collab_Album values (2, '2011-11-11', '1á', 'a11111aaaa','aa1111aaa', 2, 1);

-- Album_Elements
insert into gw_collab_Album_Elements values (1, 'photo', 1, null);
insert into gw_collab_Album_Elements values (2, 'aaa', 2, null);
insert into gw_collab_Album_Elements values (3, null, 3, null);	

-- Binomial
insert into gw_collab_Binomial values (1, 50, null, null, 'Simétrica', null, null, 'Assimétrica', 5);
insert into gw_collab_Binomial values (1, 50, null, null, 'Horizontal', null, null, 'Vertical', 5);

-- Binomial_Evaluation
insert into gw_collab_Binomial_Evaluation values (1, 'photo', 1, null, 50, 1, 1);
insert into gw_collab_Binomial_Evaluation values (2, 'photo', 2, null, 20, 2, 2);

-- Comment
insert into gw_collab_Comment values (1, '2015-01-27', null, 1, null, 'foto muito boa', 1, 1);
insert into gw_collab_Comment values (2, '2015-01-27', null, 2, null, 'foto muito boa', 1, 2);

-- Counter
insert into gw_collab_Counter values (5, '2015-01-27', null, null, null, 1, null, null, 10, 1);
insert into gw_collab_Counter values (6, '2014-01-28', null, null, null, 2, null, null, 2, 1);

-- CounterLog
insert into CounterLog values (7, '2014-01-01', 1, 1);
insert into CounterLog values (8, '2014-01-02', 2, 2);

-- Counter_CounterLog
insert into gw_collab_Counter_CounterLog values (1, 7);
insert into gw_collab_Counter_CounterLog values (2, 8);

-- External_Account
insert into gw_collab_External_Account values (1, 'a', 1, 'a', 1, 1);
insert into gw_collab_External_Account values (2, 'n', 2, 'n', 2, 2);

-- Friendship
insert into gw_collab_Friendship values (1, 1, 1);
insert into gw_collab_Friendship values (2, 2, 2);

-- Friends
insert into gw_collab_Friends values (1, 2);
insert into gw_collab_Friends values (2, 1);

-- Friends_Requests
insert into gw_collab_Friends_Requests values (1, 2);
insert into gw_collab_Friends_Requests values (2, 1);

-- Role
insert into gw_collab_Role values (4, 'Administrador', 2);
insert into gw_collab_Role values (5, 'Usuario', 2);
insert into gw_collab_Role values (6, 'Visitante', 2);

-- Tag
insert into gw_collab_Tag values (27, 1, 'Tag', 19);
insert into gw_collab_Tag values (28, 1, 'TagDOis', 19);

-- Tag_Assignments
insert into gw_collab_Tag_Assignments values (27, null, 1, null);
insert into gw_collab_Tag_Assignments values (28, null, 1, null);	

-- Users_Roles
insert into gw_collab_users_roles values (1, 4);
insert into gw_collab_users_roles values (2, 5);

-- Faq
insert into Faq values (1, 'pergunta1', 'resposta1', 1);
insert into Faq values (2, 'pergunta2', 'resposta2', 2);	